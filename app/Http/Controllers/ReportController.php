<?php
    
namespace App\Http\Controllers;
    
use App\Models\Report;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{ 
    /**
     * Permission assignations.
     *
     */
    function __construct()
    {
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
        //Select from customer table where fullname like request, query sends back data to second query
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

        //Select from Report table where Customer id equals result from previous query, function sends back data to search bar
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
        //Validation rules for inputs
        request()->validate([
            'nombre' => 'required|exists:customers,fullName',
            'marca' => 'required',
            'modelo' => 'required',
            'numeroserie' => 'required',
            'accesorios' => '',
            'fallo' => '',
            'costodiagnostico' => 'numeric'
        ]);
        //Select from customer table where fullName of input matches first customer record
        $id = Customer::where('fullName', $request->nombre)->first()->id;

        //Get current date and format to YMD
        $entranceDate = Carbon::now();
        $entranceDate->format('Y-m-d H:i:s');

        //Array used to insert into database
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

        //Insert into database
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
        //Validation rules for inputs
         request()->validate([
            'fullName' => 'required|exists:customers',
            'equipmentBrand' => 'required',
            'equipmentModel' => 'required',
            'equipmentSN' => 'required',
            'equipmentAccesories' => '',
            'reportedFail' => ''
        ]);
        
        //Select Customer where fullName matches request
        $id = Customer::where('fullName', $request->fullName)->first()->id;
        
        //Update table with request
        $report->update([
            'customer_id' => $id,
            'equipmentBrand' => $request->equipmentBrand,
            'equipmentModel' => $request->equipmentModel,
            'equipmentSN' => $request->equipmentSN,
            'equipmentAccesories' => $request->equipmentAccesories,
            'reportedFail' => $request->reportedFail

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

    /* 
        Show the form for finishing the specified report.
    */ 
    public function finish(Request $request, $id)
    {
        $report = Report::find($id);
        //Validation rules for input
        request()->validate([
            'solucion' => 'required',
            'costoFinal' => 'required'
        ]);
        
        //Get current date and format to YMD
        $exitDate = Carbon::now();
        $exitDate->format('Y-m-d H:i:s');

        //Update specified report 
        $report->update([
            'solution' => $request->solucion,
            'finalCost' => $request->costoFinal,
            'exitDate' => $exitDate,
            'state_id' => 3
        ]);
    
        return redirect()->route('reports.index')
                        ->with('success','El reporte ha sido cerrado');
    }

    /* 
        Function to autocomplete customer field
    */
    public function autocomplete(Request $request)
    {
        
        $input = $request->all();
        $data = Customer::select("fullName as name")->where("fullName","LIKE","%{$input['query']}%")->get();
   
        return response()->json($data);
        
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