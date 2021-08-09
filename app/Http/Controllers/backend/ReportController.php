<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    }

    public function ReportDate(Request $request)
    {
    //    return $request->all();
       $date = new DateTime($request->date);
       $formatedDate = $date->format('d F Y');
       $order = Order::where('order_date',$formatedDate)->latest()->get();
       return view('backend.report.report_search_view',compact('order'));
    }

    public function ReportMonthYear(Request $request)
    {
        $order = Order::where('order_month',$request->month)->where('order_year',$request->monthyear)->latest()->get();
        return view('backend.report.report_search_view',compact('order'));
    }

    public function ReportYear(Request $request)
    {
        $order = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_search_view',compact('order'));
    }
}
