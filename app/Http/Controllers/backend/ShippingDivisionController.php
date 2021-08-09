<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;

class ShippingDivisionController extends Controller
{
    public function DivisionView()
    {
        $divisions = ShippingDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.division_view', compact('divisions'));
    }

    public function DivisionStore(Request $request)
    {
       $validate = $request->validate([
           'division_name' => 'required',
       ]);

       ShippingDivision::insert([
           'division_name' => $request->division_name,
           'created_at' => Carbon::now(),
       ]);
       $notification = array(
           'message' => 'Division inserted successfully',
           'alert-type' => 'success'
       );
       return Redirect()->back()->with($notification);
    }

    public function DivisionEdit($id)
    {
        $division = ShippingDivision::findOrFail($id);
        return view('backend.ship.division.division_edit', compact('division'));
    }

    public function DivisionUpdate(Request $request,$id)
    {
        ShippingDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division updated successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('manage.division')->with($notification);
    }

    public function DivisionDelete($id)
    {
        ShippingDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function DistrictView()
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id','DESC')->get();
        return view('backend.ship.district.district_view', compact('districts','divisions'));
    }

    public function DistrictStore(Request $request)
    {
        $validate = $request->validate([
            'division_id' => 'required',
            'district_name' => 'required'
        ]);

        ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function DistrictEdit($id)
    {
       $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
       $district = ShippingDistrict::findOrFail($id);
       return view('backend.ship.district.district_edit',compact('district','divisions'));
    }

    public function DistrictUpdate(Request $request,$id)
    {
        ShippingDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District updated successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('manage.district')->with($notification);
    }

    public function DistrictDelete($id)
    {
        ShippingDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function StateView()
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name','ASC')->get();
        $states = ShippingState::with('division','district')->orderBy('id','DESC')->get();
        return view('backend.ship.state.state_view', compact('states','divisions','districts'));
    }

    public function GetDistrict($id)
    {
       $district = ShippingDistrict::where('division_id',$id)->orderBy('district_name','ASC')->get();
       return json_encode($district);
    }
    
    public function StateStore(Request $request)
    {
       $request->validate([
        'division_id' => 'required',
        'district_id' => 'required',
        'state_name' => 'required',
       ]);

       ShippingState::insert([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
        'created_at' => Carbon::now(),
       ]);
       $notification = array(
        'message' => 'State inserted successfully',
        'alert-type' => 'success'
       );
       return Redirect()->back()->with($notification);
    }

    public function StateEdit($id)
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name','ASC')->get();
        $state = ShippingState::findOrFail($id);
        return view('backend.ship.state.state_edit', compact('state','divisions','districts'));
    }

    public function StateUpdate(Request $request,$id)
    {
        ShippingState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State updated successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('manage.state')->with($notification);
    }

    public function StateDelete($id)
    {
        ShippingState::findOrFail($id)->delete();
        $notification = array(
            'message' => 'State deleted successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

    }
}
