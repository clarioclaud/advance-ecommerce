<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;

class HomeBlogController extends Controller
{
    public function AddBlogList()
    {
        $category = BlogCategory::latest()->get();
        $post = BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('category','post'));
    }

    public function BlogDetails($id)
    {
        $category = BlogCategory::latest()->get();
        $postdetails = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('category','postdetails'));
    }

    public function BlogCategoryDetails($category_id)
    {
        $category = BlogCategory::latest()->get();
        $post = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
        return view('frontend.blog.blog_category_list',compact('category','post'));
    }
}
