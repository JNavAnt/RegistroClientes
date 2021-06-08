<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    //
    /*
    * Covert blade page into PDF report
    */
    public function print($id)
    {
        $report = Report::find($id);
        
        $pdf = PDF::loadView('reports.print', ['report' => $report]);
        
        return $pdf->stream('Report.pdf');
    }

}
