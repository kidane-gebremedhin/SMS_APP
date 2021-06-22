<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_type;
use Auth;
use DB;

class product_typeController extends Controller
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
       
       $product_types=product_type::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("product_types.ajax.index")->with('product_types', $product_types);

       return view("product_types.http.index")->with('product_types', $product_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    
        
	if($request->ajax())
	    return view('product_types.ajax.create');

	    return view('product_types.http.create');
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
            ]);

        $product_type=product_type::where('name', '=', $request->name)->first();
        if($product_type!=null){
            if($request->ajax())
                return ['error', "Duplicate_Entry"]; 
            return back();
        }
        $product_type=new product_type;
        $product_type->name=$request->name;
        $product_type->minPrice=$request->minPrice;
        $product_type->maxPrice=$request->maxPrice;
        $product_type->remark=$request->remark;
        $product_type->createdByUserId=Auth::guard('web')->user()->id;
        $product_type->save();
        return redirect()->route("product_types.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $product_type=product_type::find($id);
        if($request->ajax())
            return view("product_types.ajax.show")->with('product_type', $product_type);
        return view("product_types.http.show")->with('product_type', $product_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$product_type=product_type::find($id);
        
	if($request->ajax())
	    return view('product_types.ajax.edit')->with('product_type', $product_type);

	    return view('product_types.http.edit')->with('product_type', $product_type);
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
        $product_type=product_type::where('name', '=', $request->name)->first();
        if($product_type!=null && $product_type->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }
         $this->validate($request, [
            'name'=>'required'
            ]);

        $product_type=product_type::find($id);
        $product_type->name=$request->name;
        $product_type->minPrice=$request->minPrice;
        $product_type->maxPrice=$request->maxPrice;
        $product_type->remark=$request->remark;
        $product_type->createdByUserId=Auth::guard('web')->user()->id;
        $product_type->save();

        return redirect()->route("product_types.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $product_type=product_type::find($id);
       if($request->ajax())
        return view('product_types.ajax.delete-confirm')->with('product_type', $product_type);
        
        return view('product_types.http.delete-confirm')->with('product_type', $product_type);
    }
 	public function destroy($id, Request $request)
    {
        $product_type=product_type::find($id);
        $product_type->delete();

        return redirect()->route('product_types.index');
    }

}
