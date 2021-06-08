<?php
    
namespace App\Http\Controllers;
    
use App\Models\Customer;
use Illuminate\Http\Request;
    
class CustomerController extends Controller
{ 
    /**
     * Permission assignations.
     *
     */
    
    function __construct()
    {

        $this->middleware('permission:Mostrar cliente|Crear cliente|Editar cliente|Borrar cliente', ['only' => ['index','store']]);
        $this->middleware('permission:Crear cliente', ['only' => ['create','store']]);
        $this->middleware('permission:Editar cliente', ['only' => ['edit','update']]);
        $this->middleware('permission:Borrar cliente', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Select from customer table where fullname like request, function sends back data to search bar
        $customers = Customer::where([
            ['fullName', '!=', Null],
            [function($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('fullName', 'LIKE', '%'.$term.'%')->get();
                }
            }]
        ])
            ->orderBy("id","desc")
            ->paginate(10);

        return view('customers.index',compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation rules for input fields
        request()->validate([
            'nombre' => 'required',
            'negocio' => 'required',
            'email' => 'required| unique:customers,email',
            'telefono' => 'required'
        ]);
        
        //Array used to insert into database
        $input = [
            'fullName' => $request->nombre,
            'business' => $request->negocio,
            'email' => $request->email,
            'phone' => $request->telefono,
              
        ];

        Customer::create($input);
    
        return redirect()->route('customers.index')
                        ->with('success','El cliente ha sido creado.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
         //Validation rules for input fields
         request()->validate([
            'fullName' => 'required',
            'business' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $customer->update($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','El cliente ha sido actualizado');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {

        //Validate that this customer doesn't have any report tied to it
        $customerRel = Customer::has('report')->find($customer->id);
        if($customerRel != null){
            return redirect()->route('customers.index')
                            ->with('error','El cliente no puede ser borrado, existen reportes ligados a este');
        }else{
            $customer->delete();
    
            return redirect()->route('customers.index')
                            ->with('success','El cliente ha sido borrado');
        }
        
    }
}