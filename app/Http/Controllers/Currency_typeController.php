<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\currency_type;
use DB;

class Currency_typeController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
     
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
       $currency_types=currency_type::orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("currency_types.ajax.index")->withCurrency_types($currency_types);

       return view("currency_types.http.index")->withCurrency_types($currency_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax())
            return view("currency_types.ajax.create");
        return view("currency_types.http.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon'=>'required|unique:currencyTypes',
            'name'=>'required|unique:currencyTypes'
            ]);

        $currency_type=new currency_type;
        $currency_type->icon=$request->icon;
        $currency_type->name=$request->name;
        $currency_type->description=$request->description;
        $currency_type->save();
        return redirect()->route("currency_types.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $currency_type=currency_type::find($id);
        if($request->ajax())
            return view("currency_types.ajax.show")->withCurrency_type($currency_type);
        return view("currency_types.http.show")->withCurrency_type($currency_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $currency_type=currency_type::find($id);

        if($request->ajax())
            return view("currency_types.ajax.edit")->withCurrency_type($currency_type);
        return view("currency_types.http.edit")->withCurrency_type($currency_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currency_type=currency_type::where('icon', '=', $request->icon)->first();
        if($currency_type!=null && $currency_type->id!=$id)
            return ['status'=>'error', 'data'=>"Error! currency icon already taken."];

        $currency_type=currency_type::where('name', '=', $request->name)->first();
        if($currency_type!=null && $currency_type->id!=$id)
            return ['status'=>'error', 'data'=>"Error! currency name already taken."];

        $this->validate($request, [
            'icon'=>'required',
            'name'=>'required'
            ]);
       $currency_type=currency_type::find($id);
        $currency_type->icon=$request->icon;
        $currency_type->name=$request->name;
        $currency_type->description=$request->description;
        $currency_type->save();

        return redirect()->route("currency_types.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $currency_type=currency_type::find($id);
       if($request->ajax())
        return view('currency_types.ajax.delete-confirm')->withCurrency_type($currency_type);
        
        return view('currency_types.http.delete-confirm')->withCurrency_type($currency_type);
    }
 public function destroy($id, Request $request)
    {
        $currency_type=currency_type::find($id);
        $currency_type->delete();

        return redirect()->route('currency_types.index');
    }
}
