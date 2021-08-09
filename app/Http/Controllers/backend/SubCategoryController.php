<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubsubCategory;
use Illuminate\Support\Carbon;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','category'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
        ],
        [
            'category_id.required' => 'Select any category',
            'subcategory_name_en.required' => 'Input subcategory name in English',
            'subcategory_name_hin.required' => 'Input subcategory name in Hindi'
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','-',$request->subcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Subcategory inserted successfully',
            'alert-type' => 'success'

        );

        return Redirect()->back()->with($notification);

    }

    public function SubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','category'));
    }

    public function SubCategoryUpdate(Request $request){
        $id = $request->id;
        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','-',$request->subcategory_name_hin),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Subcategory updated successfully',
            'alert-type' => 'info'

        );

        return Redirect()->route('admin.subcategory')->with($notification);  
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subcategory deleted successfully',
            'alert-type' => 'danger'
        );

        return Redirect()->back()->with($notification); 

    }

    //subsubcategory
    public function SubSubCategoryView(){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubsubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','category'));
    }

    public function GetSubCategory($category_id){
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','Asc')->get();
        return json_encode($subcategory);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcategory = SubsubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','Asc')->get();
        return json_encode($subsubcategory);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
        ],
        [
            'category_id.required' => 'Select any category',
            'subcategory_id.required' => 'Select any sub category',
            'subsubcategory_name_en.required' => 'Input sub->subcategory name in English',
            'subsubcategory_name_hin.required' => 'Input sub->subcategory name in Hindi'
        ]);

        SubsubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','-',$request->subsubcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Sub Subcategory inserted successfully',
            'alert-type' => 'success'

        );

        return Redirect()->back()->with($notification);

    }

    public function SubSubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubsubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('category','subcategory','subsubcategory'));

    }

    public function SubSubCategoryUpdate(Request $request){
        $id = $request->id;
        SubsubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','-',$request->subsubcategory_name_hin),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Sub Subcategory updated successfully',
            'alert-type' => 'info'

        );

        return Redirect()->route('admin.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubsubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Subcategory deleted successfully',
            'alert-type' => 'error'

        );

        return Redirect()->back()->with($notification);

    }

    
}
