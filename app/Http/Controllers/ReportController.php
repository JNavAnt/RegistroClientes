<?php
    
namespace App\Http\Controllers;
    
use App\Models\Report;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReportController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index','show']]);
         $this->middleware('permission:report-create', ['only' => ['create','store']]);
         $this->middleware('permission:report-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:report-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::latest()->paginate(5);
        return view('reports.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fullName' => 'required|exists:customers',
            'equipmentBrand' => 'required',
            'equipmentModel' => 'required',
            'equipmentSN' => 'required',
            'equipmentAccesories' => '',
            'reportedFail' => '',
            'solution' => '',
            'diagnosticCost' => 'numeric',
            'finalCost' => 'numeric',
            'entranceDate' => 'required',
            'exitDate' => ''
        ]);
        $id = Customer::where('fullName', $request->fullName)->first()->id;
        $entranceDate = \Carbon\Carbon::parse($request->entranceDate);
        $entranceDate->format('Y-m-d H:i:s');
        $exitDate = \Carbon\Carbon::parse($request->exitDate);
        $exitDate->format('Y-m-d H:i:s');

        /*Report::create($request->all());*/
        Report::create([
            'customer_id' => $id,
            'equipmentBrand' => $request->equipmentBrand,
            'equipmentModel' => $request->equipmentModel,
            'equipmentSN' => $request->equipmentSN,
            'equipmentAccesories' => $request->equipmentAccesories,
            'reportedFail' => $request->reportedFail,
            'solution' => $request->solution,
            'diagnosticCost' => $request->diagnosticCost,
            'finalCost' => $request->finalCost,
            'entranceDate' => $entranceDate,
            'exitDate' => $exitDate,

        ]);
        return redirect()->route('reports.index')
                        ->with('success','Report created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('reports.show',compact('report'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('reports.edit',compact('report'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
         request()->validate([
            'fullName' => 'required|exists:customers',
            'equipmentBrand' => 'required',
            'equipmentModel' => 'required',
            'equipmentSN' => 'required',
            'equipmentAccesories' => '',
            'reportedFail' => '',
            'solution' => '',
            'diagnosticCost' => 'numeric',
            'finalCost' => 'numeric',
            'entranceDate' => 'required',
            'exitDate' => ''
        ]);
        
        $id = Customer::where('fullName', $request->fullName)->first()->id;
        $entranceDate = \Carbon\Carbon::parse($request->entranceDate);
        $entranceDate->format('Y-m-d H:i:s');
        $exitDate = \Carbon\Carbon::parse($request->exitDate);
        $exitDate->format('Y-m-d H:i:s');
        /*$report->update($request->all());*/
        $report->update([
            'customer_id' => $id,
            'equipmentBrand' => $request->equipmentBrand,
            'equipmentModel' => $request->equipmentModel,
            'equipmentSN' => $request->equipmentSN,
            'equipmentAccesories' => $request->equipmentAccesories,
            'reportedFail' => $request->reportedFail,
            'solution' => $request->solution,
            'diagnosticCost' => $request->diagnosticCost,
            'finalCost' => $request->finalCost,
            'entranceDate' => $entranceDate,
            'exitDate' => $exitDate,

        ]);
    
        return redirect()->route('reports.index')
                        ->with('success','Report updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
    
        return redirect()->route('reports.index')
                        ->with('success','Report deleted successfully');
    }
}