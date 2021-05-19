<?php
    
namespace App\Http\Controllers;
    
use App\Models\Report;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         /*$this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index','show']]);
         $this->middleware('permission:report-create', ['only' => ['create','store']]);
         $this->middleware('permission:report-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:report-delete', ['only' => ['destroy']]);*/

        $this->middleware('permission:Mostrar reporte|Crear reporte|Editar reporte|Borrar reporte', ['only' => ['index','store']]);
        $this->middleware('permission:Crear reporte', ['only' => ['create','store']]);
        $this->middleware('permission:Editar reporte', ['only' => ['edit','update']]);
        $this->middleware('permission:Borrar reporte', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $customer = Customer::where([
            ['fullName', '!=', Null],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('fullName', 'LIKE', '%'.$term.'%')->get();
                }
            }]
        ])
            ->orderBy("id","desc")
            ->paginate(10);

        $reports = Report::where(
            function ($query) use ($customer) {
                foreach($customer as $customer) {
                    $query->orWhere('customer_id', '=', "$customer->id")->get();
                }
        })->orderBy("id","desc")
        ->paginate(10);

        return view('reports.index',compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $date = Carbon::now();
        return view('reports.create',compact('date'));
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
            'nombre' => 'required|exists:customers,fullName',
            'marca' => 'required',
            'modelo' => 'required',
            'numeroserie' => 'required',
            'accesorios' => '',
            'fallo' => '',
            'costodiagnostico' => 'numeric',
            //'fechaentrada' => '',
        ]);

        $id = Customer::where('fullName', $request->nombre)->first()->id;
        //$entranceDate = Carbon::parse($request->fechaentrada);
        $entranceDate = Carbon::now();
        $entranceDate->format('Y-m-d H:i:s');

        $input = [
            'customer_id' => $id,
            'equipmentBrand' => $request->marca,
            'equipmentModel' => $request->modelo,
            'equipmentSN' => $request->numeroserie,
            'equipmentAccesories' => $request->accesorios,
            'reportedFail' => $request->fallo,
            'diagnosticCost' => $request->costodiagnostico,
            'entranceDate' => $entranceDate,
        ];
        Report::create($input);

        return redirect()->route('reports.index')
                        ->with('success','El reporte ha sido creado.');
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
     * Print the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //$date = $report->entranceDate->format('d/m/y h:i:s');
        $date = \Carbon\Carbon::parse($report->entranceDate)->format('d/m/y h:i:s');
        //$customer = $report = Customer::find($report->customer->id);
        return view('reports.edit',compact('report','date'));
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
            'finalCost' => 'numeric|nullable',
            'entranceDate' => '',
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
                        ->with('success','El reporte ha sido actualizado');
    }
    
    /* 
        Show the form for closng the specified report.
    */ 

    public function close($id)
    {
        $report = Report::find($id);
        return view('reports.close',compact('report'));
    }

    public function finish(Request $request, $id)
    {
        $report = Report::find($id);
         request()->validate([
            'solucion' => 'required',
            'costoFinal' => 'required'
        ]);
        
        $exitDate = Carbon::now();
        $exitDate->format('Y-m-d H:i:s');
        /*$report->update($request->all());*/
        $report->update([
            'solution' => $request->solucion,
            'finalCost' => $request->costoFinal,
            'exitDate' => $exitDate,
            'state_id' => 3
        ]);
    
        return redirect()->route('reports.index')
                        ->with('success','El reporte ha sido cerrado');
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
                        ->with('success','El reporte ha sido borrado');
    }

    
}