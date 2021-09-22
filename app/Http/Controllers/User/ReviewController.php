<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Reviews;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {
        $product_id = $request->product_id;

        $request->validate([
            'summary' => 'required',
            'review' => 'required',
        ]);

        Reviews::insert([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
            'summary' => $request->summary,
            'review' => $request->review,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
