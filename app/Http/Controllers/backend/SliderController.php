<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required|mimes:jpg,jpeg,png'
        ],
        [
            'slider_img.required' => 'Please upload slider image'      
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
        $save_url = 'uploads/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);        
    }

    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function SliderUpdate(Request $request){
        $image = $request->file('slider_img');
        $old_image = $request->old_image;
        $id = $request->id;
        if ($image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
            $save_url = 'uploads/slider/'.$name_gen;
            unlink($old_image);
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('manage.slider')->with($notification); 
        } else {
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('manage.slider')->with($notification);
        }
    }

    public function SliderDelete($id){
        $image = Slider::findOrFail($id);
        unlink($image->slider_img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider Inactivated successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Slider Activated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
}
