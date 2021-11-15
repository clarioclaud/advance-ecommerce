<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserRoleController extends Controller
{
    public function AdminUserList()
    {
        $adminusers = Admin::where('type',2)->latest()->get();
        return view('backend.role.adminusers', compact('adminusers'));
    }

    public function AddAdminUser()
    {
        return view('backend.role.addadminuser');
    }

    public function AdminUserStore(Request $request)
    {
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('uploads/admin_images/'.$name_gen);
        $save_url = 'uploads/admin_images/'.$name_gen;
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'brands' => $request->brands,
            'categories' => $request->categories,
            'products' => $request->products,
            'slider' => $request->slider,
            'coupons' => $request->coupons,

            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'site' => $request->site,
            'returnorders' => $request->returnorders,
            'review' => $request->review,

            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'allusers' => $request->allusers,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Admin User Role Inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.user.role')->with($notification);

    }

    public function EditAdminUser($id)
    {
        $adminusers = Admin::findOrFail($id);
        return view('backend.role.editusers', compact('adminusers'));
    }

    public function UpdateAdminUser(Request $request)
    {
        $id = $request->id;
        $old_image = $request->old_image;
        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('uploads/admin_images/'.$name_gen);
            $save_url = 'uploads/admin_images/'.$name_gen;
            unlink($old_image);
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                
                'brands' => $request->brands,
                'categories' => $request->categories,
                'products' => $request->products,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'site' => $request->site,
                'returnorders' => $request->returnorders,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'allusers' => $request->allusers,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'updated_at' => Carbon::now()
            ]);
            
            $notification = array(
                'message' => 'Admin User updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('admin.user.role')->with($notification);

        }else{
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                
                'brands' => $request->brands,
                'categories' => $request->categories,
                'products' => $request->products,
                'slider' => $request->slider,
                'coupons' => $request->coupons,

                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'site' => $request->site,
                'returnorders' => $request->returnorders,
                'review' => $request->review,

                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'allusers' => $request->allusers,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
    
                'updated_at' => Carbon::now()
            ]);
            
            $notification = array(
                'message' => 'Admin User updated successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('admin.user.role')->with($notification);


        }

    }

    public function DeleteAdminUser($id)
    {
        $adminuser = Admin::findOrFail($id);
        $img = $adminuser->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
