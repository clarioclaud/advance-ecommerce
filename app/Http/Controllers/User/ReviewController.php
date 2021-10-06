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

    public function PendingReview()
    {
        $reviews = Reviews::where('status',0)->orderBy('id','DESC')->get();
        return view('backend.review.pending', compact('reviews'));
    }

    public function PendingReviewApprove($id)
    {
        $approve = Reviews::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Review Approved Successfully',
        );

        return redirect()->back()->with($notification);
    }

    public function PublishReview()
    {
        $reviews = Reviews::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.review.publish', compact('reviews'));
    }

    public function DeleteReview($id)
    {
        Reviews::findOrFail($id)->delete();

        $notification = array(
            'alert-type' => 'error',
            'message' => 'Review Deleted Successfully',
        );

        return redirect()->back()->with($notification);
    }
}
