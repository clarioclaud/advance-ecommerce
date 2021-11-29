<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ShopController extends Controller
{
    public function ShopProduct()
    {   
        $products = Product::query();
        if (!empty($_GET['category'])) {
            $slug = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slug)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds)->paginate(3);
        }elseif (!empty($_GET['brand'])) {
            $slug = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slug)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds)->paginate(3);
        } else {
            $products = Product::where('status',1)->orderBy('id','DESC')->paginate(3);
        }
      
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.shop.shop_page', compact('products','category','brands'));
    }

    public function ShopProductFilter(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                } else {
                    $catUrl .= ','.$category;
                }
                
            }
        }

        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand='.$brand;
                } else {
                    $brandUrl .= ','.$brand;
                }
                
            }
        }
        
        return Redirect()->route('shop.page',$catUrl.$brandUrl);
        
    }
}
