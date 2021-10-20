<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function ProductAdd(){
        $category = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.add_product',compact('category','brands'));
    }

    public function ProductStore(Request $request){
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;

        $productid = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->	product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            'product_thumbnail' => $save_url,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        //multi image insert
        $images = $request->multi_img;

        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-images/'.$make_name);
            $img_url = 'uploads/products/multi-images/'.$make_name;

            MultiImg::insert([
                'product_id' => $productid,
                'photo_name' => $img_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Product inserted successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('manage.product')->with($notification);

    }

    public function ProductManage(){
        $products = Product::latest()->get();
        return view('backend.product.manage_product', compact('products'));
    }

    public function ProductEdit($id){
        $brands = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubsubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multimg = MultiImg::where('product_id',$id)->get();
        return view('backend.product.product_edit', compact('brands','category','subcategory','subsubcategory','product','multimg'));

    }


    public function ProductUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->	product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
          

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product updated without image successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('manage.product')->with($notification);

    }


    public function ProductImageUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-images/'.$make_name);
            $uploadPath = 'uploads/products/multi-images/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Product image updated successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);

    }

    public function ProductThumbnailUpdate(Request $request){
        $pro_id = $request->id;
        $image = $request->pro_image;
        unlink($image);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;
       
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product Thumbnail Image updated successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);

    }

    public function ProductImageDelete($id){
        $image = MultiImg::findOrFail($id);
        unlink($image->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Image deleted successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);

    }

    public function ProductInactivate($id){
        Product::findOrFail($id)->update([
            'status' => 0
        ]);

        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }

    public function ProductActivate($id){
        Product::findOrFail($id)->update([
            'status'=> 1
        ]);
        $notification = array(
            'message' => 'Product Activated',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function ProductView($id){
        $product = Product::findOrFail($id);
        $multimg = MultiImg::where('product_id',$id)->get();
        return view('backend.product.product_view', compact('product','multimg'));

    }

    public function ProductDelete($id){
        $image = Product::findOrFail($id);
        unlink($image->product_thumbnail);
        Product::findOrFail($id)->delete();

        $image = MultiImg::where('product_id',$id)->get();
        foreach ($image as  $img) {
           unlink($img->photo_name);
           MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);

    }

    public function ProductStockManage(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
}
