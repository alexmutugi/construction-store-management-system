<?php

namespace App\Http\Controllers;

use App\material;
use App\material_usage;
use App\tools_allocation;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    //reports
    public function report()
    {
        $tools=tools_allocation::all();
        return view('Admin.IndexReport',compact('tools'));
    }
    public function reportcurrent()
    {
        $data=material::all();
        return view('Admin.currentReport',compact('data'));
    }
    public function reportusage()
    {
        $data=material_usage::all();
        return view('Admin.usageReport',compact('data'));
    }


//dompdf
    public function pdf(Request $request)
    {
        $monthy=$request->month;
        $mons=booking::whereMonth('created_at',$monthy)
            ->orderBy('created_at', 'ASC')
            ->get();

        $pdf=PDF::loadView('Admin.reports.pdf',['mons'=>$mons,'monthy'=>$monthy]);

        return $pdf->stream('Booking_report.pdf');
    }

    public function indexpdf()
    {
        $bookings=booking::all();
        $pend=count(booking::where('status','pending')->get());
        return view('Admin.reports.indexPdf',compact('pend','bookings'));
    }

    public function monthlyReport(Request $request)
    {
        $this->validate($request,[
            'month'=>'required'
        ]);
        $monthy=$request->month;
        $pend=count(booking::where('status','pending')->get());

        $bookings=booking::whereMonth('created_at',$monthy)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('Admin.reports.sort',compact('pend','bookings','monthy'));
    }
}
