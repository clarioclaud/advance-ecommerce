<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogCategory;
use Carbon\Carbon;
use App\Models\Blog\BlogPost;
use Image;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.blog.category.blog_category_view',compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request)
    {
        $validate = $request->validate([
            'blog_category_name_en' => 'required|unique:blog_categories',
            'blog_category_name_hin' => 'required'
        ],
        [
            'blog_category_name_en.required' => 'Enter the Blog Category English',
            'blog_category_name_hin.required' => 'Enter the Blog Category Hindi',
        ]);

        BlogCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ','-',$request->blog_category_name_hin),
            'created_at' => Carbon::now(),
        ]); 
        
        $notification =  array(
            'alert-type' => 'success',
            'message' => 'Blog Category Inserted Successfully', 
        );
        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.blog.category.blog_category_edit',compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request)
    {
        $id = $request->id;
        BlogCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ','-',$request->blog_category_name_hin),
            'updated_at' => Carbon::now(), 
        ]);
        $notification =  array(
            'alert-type' => 'info',
            'message' => 'Blog Category Updated Successfully', 
        );
        return redirect()->route('manage.blog.category')->with($notification);
    }

    public function BlogCategoryDelete($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification =  array(
            'alert-type' => 'error',
            'message' => 'Blog Category Deleted Successfully', 
        );
        return redirect()->back()->with($notification);
    }

    public function BlogPostAdd()
    {
        $blogcategory = BlogCategory::orderBy('blog_category_name_en','ASC')->get();
        return view('backend.blog.post.blog_post_view',compact('blogcategory'));

    }

    public function BlogPostView()
    {
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.blog_post_list',compact('blogpost'));
    }

    public function BlogPostStore(Request $request)
    {
        $validate = $request->validate([
            'blog_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('uploads/blog/'.$name_gen);
        $save_url = 'uploads/blog/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'blog_title_en' => $request->blog_title_en, 
            'blog_title_hin' => $request->blog_title_hin, 
            'blog_title_slug_en' => strtolower(str_replace(' ','-',$request->blog_title_en)), 
            'blog_title_slug_hin' => str_replace(' ','-',$request->blog_title_hin), 
            'blog_image' => $save_url, 
            'blog_details_en' => $request->blog_details_en, 
            'blog_details_hin' => $request->blog_details_hin, 
            'created_at' => Carbon::now(), 
        ]);
        
        $notification = array(
            'message' => 'Post inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('blog.post.list')->with($notification);
    }

    public function BlogEdit($id)
    {
        $id = BlogPost::findOrFail($id);
        $blogcategory = BlogCategory::orderBy('blog_category_name_en','ASC')->get();
        return view('backend.blog.post.blog_edit',compact('id','blogcategory'));
    }

    public function BlogPostUpdate(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;
        $image = $request->file('blog_image');

        if ($image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('uploads/blog/'.$name_gen);
            $save_url = 'uploads/blog/'.$name_gen;
            unlink($old_image);

            BlogPost::findorFail($id)->update([
                'category_id' => $request->category_id,
                'blog_title_en' => $request->blog_title_en,
                'blog_title_hin' => $request->blog_title_hin,
                'blog_title_slug_en' => strtolower(str_replace(' ','-',$request->blog_title_en)), 
                'blog_title_slug_hin' => str_replace(' ','-',$request->blog_title_hin), 
                'blog_image' => $save_url,
                'blog_details_en' => $request->blog_details_en,
                'blog_details_hin' => $request->blog_details_hin,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'alert-type' => 'info',
                'message' => 'Post Updated successfully',
            );
            return Redirect()->route('blog.post.list')->with($notification);
        } else {
            BlogPost::findorFail($id)->update([
                'category_id' => $request->category_id,
                'blog_title_en' => $request->blog_title_en,
                'blog_title_hin' => $request->blog_title_hin,
                'blog_title_slug_en' => strtolower(str_replace(' ','-',$request->blog_title_en)), 
                'blog_title_slug_hin' => str_replace(' ','-',$request->blog_title_hin), 
                'blog_details_en' => $request->blog_details_en,
                'blog_details_hin' => $request->blog_details_hin,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'alert-type' => 'info',
                'message' => 'Post Updated successfully',
            );
            return Redirect()->route('blog.post.list')->with($notification);
        }
        
    }

    public function BlogDelete($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $image = $blogpost->blog_image;
        unlink($image);
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }

}
