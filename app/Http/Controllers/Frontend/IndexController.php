<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\User;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog\BlogPost;

class IndexController extends Controller
{
    public function Index(){
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(5)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        $skip_category_0 = Category::skip(0)->first();        
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        $skip_category_1 = Category::skip(3)->first();        
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();
        $skip_brand_0 = Brand::skip(0)->first();        
        $skip_product_2 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();   
        $post = BlogPost::latest()->get();
        // return $skip_category_0->id;
        // die();
        return view('frontend.index',compact('category','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_0','skip_product_2','post'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.index', compact('user'));
    }

    public function UserProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone =$request->phone;

        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').'.'.$image->getClientOriginalName();
            $image->move(public_path('uploads/user_images/'),$filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'profile updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('dashboard')->with($notification);

    }

    public function UserChangePassword(){
        $data = User::find(Auth::id());
        return view('frontend.profile.change_password',compact('data'));
    }

    public function UserPasswordUpdate(Request $request){
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = User::find(Auth::id())->password;
        if(Hash::check($request->old_password, $hashedPassword)){
                $data = User::find(Auth::id());
                $data['password'] = Hash::make($request->password);
                $data->save();
                Auth::logout();
                $notification = array(
                    'message' => 'Password Updated',
                    'alert-type' => 'success'
                );
                return Redirect()->route('user.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current password is incorrect',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function ProductDetail($id,$slug){
        $product = Product::findOrFail($id);
        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',',$color_hin);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',',$size_hin);

        $multimg = MultiImg::where('product_id',$id)->get();
        $upsellProducts = Product::where('category_id',$product->category_id)->where('status',1)->where('id','!=',$id)->orderBy('id','DESC')->get();
        return view('frontend.product.product_detail', compact('product','multimg','product_color_en','product_color_hin','product_size_en','product_size_hin','upsellProducts'));
    }

    
    public function TagWiseProduct($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->paginate(3);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.product_tags_view', compact('products','category'));
    }

    public function SubcategoryProduct(Request $request,$subcat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
        $category = Category::orderBy('category_name_en','ASC')->get();
        $breadsubitems = SubCategory::with(['Category'])->where('id',$subcat_id)->get();
        //load product with ajax
        if ($request->ajax) {
            $grid_view = view('frontend.product.grid_view_page',compact('products'))->render();
            $list_view = view('frontend.product.list_view_page',compact('products'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view' => $list_view]);
        }
        //end load product with ajax
        return view('frontend.product.subcategory_view', compact('products','category','breadsubitems'));
    }

    public function SubsubcategoryProduct($subsubcat_id,$slug){
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
        $category = Category::orderBy('category_name_en','ASC')->get();
        $breadsubsubitems = SubsubCategory::with(['Category','SubCategory'])->where('id',$subsubcat_id)->get();
        return view('frontend.product.subsubcategory_view', compact('products','category','breadsubsubitems'));
    }

    public function ProductViewModal($id){
        $product = Product::with('brand','category')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',',$color);

        $size = $product->product_size_en;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function ProductSearch(Request $request)
    {
        $request->validate(["search" => "required"]);
        $search = $request->search;
        $products = Product::where('product_name_en','LIKE',"%$search%")->get();
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.search',compact('products','category'));
    }

    public function SearchProduct(Request $request)
    {
        $request->validate(["search" => "required"]);
        $search = $request->search;
        $products = Product::where('product_name_en','LIKE',"%$search%")->select('product_thumbnail','product_name_en','selling_price','id','product_slug_en')->limit(5)->get();     
        return view('frontend.product.search_product',compact('products'));
    }
}
