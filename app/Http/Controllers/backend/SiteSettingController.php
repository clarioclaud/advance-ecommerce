<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSettings;
use App\Models\Seo;
use Image;
use Carbon\Carbon;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $settings = SiteSettings::find(1);
        return view('backend.site.settings_view', compact('settings'));
    }

    public function SiteSettingUpdate(Request $request)
    {
        $settings_id = $request->id;
    
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('uploads/logo/'.$name_gen);
            $save_url = 'uploads/logo/'.$name_gen;

            SiteSettings::findOrFail($settings_id)->update([
                'logo' => $save_url,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linked_in' => $request->linked_in,
                'youtube' => $request->	youtube,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully with Image',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } else {
            SiteSettings::findOrFail($settings_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linked_in' => $request->linked_in,
                'youtube' => $request->	youtube,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
        
    }

    public function SeoSetting()
    {
        $seo = Seo::find(1);
        return view('backend.site.seo_view', compact('seo'));
    }

    public function SeoSettingUpdate(Request $request)
    {
        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Seo Setting Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
