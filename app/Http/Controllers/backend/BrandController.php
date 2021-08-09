<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ],
        [
            'brand_name_en.required' => 'Input Brand Name English',
            'brand_name_hin.required' => 'Input Brand Name Hindi'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/brands/'.$name_gen);
        $save_url = 'uploads/brands/'.$name_gen;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ','-',$request->brand_name_hin),
            'brand_image' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));

    }

    public function BrandUpdate(Request $request){
        $id = $request->id;
        $old_image = $request->old_image;
        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/brands/'.$name_gen);
            $save_url = 'uploads/brands/'.$name_gen;
            unlink($old_image);
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ','-',$request->brand_name_hin),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now() 
            ]);
            
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('admin.brands')->with($notification);

        }else{
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ','-',$request->brand_name_hin),
                'updated_at' => Carbon::now() 
            ]);
            
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('admin.brands')->with($notification);


        }

    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        unlink($image);
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

    }
}



