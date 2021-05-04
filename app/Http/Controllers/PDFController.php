<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Customer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    //

    public function print($id)
    {
        $report = Report::find($id);
        
        //view()->share('report.show', $data);
        $pdf = PDF::loadView('reports.print', ['report' => $report]);
        
        //return view('reports.print', compact('report'));
        return $pdf->stream('Report.pdf');
    }

}
