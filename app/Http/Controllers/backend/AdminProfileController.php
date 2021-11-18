<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.adminprofile', compact('adminData'));
    }

    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.adminprofile_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$filename);
            $data['profile_photo_path'] = 'uploads/admin_images/'.$filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request){
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
                $data = Admin::find(Auth::id());
                $data['password'] = Hash::make($request->password);
                $data->save();
                Auth::logout();
                $notification = array(
                    'message' => 'Password Updated',
                    'alert-type' => 'success'
                );
                return Redirect()->route('admin.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current password is incorrect',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AllUserView()
    {
        $users = User::latest()->get();
        return view('backend.user.user_view',compact('users'));
    }
}
