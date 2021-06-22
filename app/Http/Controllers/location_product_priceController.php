<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location_product_price;
use App\product_type;
use App\location;
use App\measurment_type;
use App\round;
use Auth;
use DB;

class location_product_priceController extends Controller
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
       
       $location_product_prices=location_product_price::where('isDeleted', 'false')->orderBy("id", "desc")->paginate($this->paginationSize);

       if($request->ajax())
        return view("location_product_prices.ajax.index")->with('location_product_prices', $location_product_prices);

       return view("location_product_prices.http.index")->with('location_product_prices', $location_product_prices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products_list(Request $request){
    
        $product_types=product_type::where('isDeleted', 'false')->orderBy("id", "desc")->get();
	if($request->ajax())
	    return view('location_product_prices.ajax.products_list')->with('product_types', $product_types);

	    return view('location_product_prices.http.products_list')->with('product_types', $product_types);
    }


    public function create(Request $request, $productTypeId){
    	$is_search_result=$request->is_search_result;
    	$roundId=$request->roundId;
        $product_type=product_type::find($productTypeId);
        $round=round::find($roundId);
        $locations=location::where('isDeleted', 'false')->orderBy("id", "desc")->get();
        $measurment_types=measurment_type::where('isDeleted', 'false')->orderBy("id", "desc")->get();
        $rounds=round::where('isDeleted', 'false')->orderBy("id", "desc")->get();

	if($is_search_result)
	    return view('location_product_prices.ajax.create-ajax-body')->with('product_type', $product_type)->with('locations', $locations)->with('measurment_types', $measurment_types)->with('rounds', $rounds)->with('round', $round);

	if($request->ajax())
	    return view('location_product_prices.ajax.create')->with('product_type', $product_type)->with('locations', $locations)->with('measurment_types', $measurment_types)->with('rounds', $rounds)->with('round', $round);

	    return view('location_product_prices.http.create')->with('product_type', $product_type)->with('locations', $locations)->with('measurment_types', $measurment_types)->with('rounds', $rounds)->with('round', $round);
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productTypeId)
    {
	$locations=location::where('isDeleted', 'false')->orderBy("id", "desc")->get();
	foreach($locations as $location){
		$priceStr='price_'.$location->id;
		$measurmentTypeIdStr='measurmentTypeId_'.$location->id;
		$location_product_price=location_product_price::where('productId', '=', $productTypeId)->where('locationId', '=', $location->id)->where('roundId', '=', $request->roundId)->first();
		if($location_product_price==null)
			$location_product_price=new location_product_price;
        	$location_product_price->roundId=$request->roundId;
		$location_product_price->locationId=$location->id;
		$location_product_price->productId=$productTypeId;
		$location_product_price->price=$request->$priceStr;
		$location_product_price->measurmentTypeId=$request->measurmentTypeId;//$request->$measurmentTypeIdStr;
		$location_product_price->createdByUserId=Auth::guard('web')->user()->id;
		$location_product_price->save();
	}
        return redirect()->route("location_product_prices.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $location_product_price=location_product_price::find($id);
        if($request->ajax())
            return view("location_product_prices.ajax.show")->with('location_product_price', $location_product_price);
        return view("location_product_prices.http.show")->with('location_product_price', $location_product_price);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
	$location_product_price=location_product_price::find($id);
        $measurment_types=measurment_type::where('isDeleted', 'false')->orderBy("id", "desc")->get();
        $rounds=round::where('isDeleted', 'false')->orderBy("id", "desc")->get();

	if($request->ajax())
	    return view('location_product_prices.ajax.edit')->with('location_product_price', $location_product_price)->with('measurment_types', $measurment_types)->with('rounds', $rounds);

	    return view('location_product_prices.http.edit')->with('location_product_price', $location_product_price)->with('measurment_types', $measurment_types)->with('rounds', $rounds);
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
        $location_product_price=location_product_price::find($id);
        //$location_product_price->roundId=$request->roundId;
        $location_product_price->price=$request->price;
        $location_product_price->measurmentTypeId=$request->measurmentTypeId;
        $location_product_price->save();

        return redirect()->route("location_product_prices.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $location_product_price=location_product_price::find($id);
       if($request->ajax())
        return view('location_product_prices.ajax.delete-confirm')->with('location_product_price', $location_product_price);
        
        return view('location_product_prices.http.delete-confirm')->with('location_product_price', $location_product_price);
    }
 	public function destroy($id, Request $request)
    {
        $location_product_price=location_product_price::find($id);
        $location_product_price->delete();

        return redirect()->route('location_product_prices.index');
    }

}
