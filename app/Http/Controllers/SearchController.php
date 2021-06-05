<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Customer::whereRaw("UPPER(item_name) LIKE '%" . strtoupper($request) . "%'")->get();
        /*$data = Customer::select("fullName")
        //->where("fullName","=","%.$request->query.%")
        ->where("fullName",'LIKE', '%' . $request->query . '%')
        
        ->get();*/
        $data = json_encode($data);
        return response()->json($data);
        
    }
}