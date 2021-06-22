<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\customer;
use App\Global_var;
use App\toff_meadi;
use App\toff_message;
use App\toffegna;
use App\vendor_type;
use App\vendors_merchant;
use App\reference_item;
use Auth;
use DB;

class reportController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }

    
    public function reports(Request $request)
    {
    
        if($request->ajax())
        return view("reports.ajax.index");

       return view("reports.http.index");
    }

    public function delivery_mistakes(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $is_search_result=$request->is_search_result;
        $all_toff_meadis=toff_meadi::where('isDeleted', 'true')->get();
        $valid_toff_meadiIds=[];
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;


            array_push($valid_toff_meadiIds, $toff_meadi->id);
        }
        $canceled_toff_meadis=toff_meadi::whereIn('id', $valid_toff_meadiIds)->get();

        $all_toff_messages=toff_message::where('isDeleted', 'true')->get();
        $valid_toff_messageIds=[];
        foreach ($all_toff_messages as $toff_message) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_message->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_message->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_message->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_message->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_message->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_message->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_message->date))
            continue;

            array_push($valid_toff_messageIds, $toff_message->id);
        }
        $canceled_toff_messages=toff_message::whereIn('id', $valid_toff_messageIds)->get();


        $all_toff_meadis=toff_meadi::where('isChanged', 'true')->get();
        $valid_toff_meadiIds=[];
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;

            array_push($valid_toff_meadiIds, $toff_meadi->id);
        }
        $changed_toff_meadis=toff_meadi::whereIn('id', $valid_toff_meadiIds)->get();

        $all_toff_messages=toff_message::where('isChanged', 'true')->get();
        $valid_toff_messageIds=[];
        foreach ($all_toff_messages as $toff_message) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_message->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_message->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_message->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_message->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_message->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_message->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_message->date))
            continue;

            array_push($valid_toff_messageIds, $toff_message->id);
        }
        $changed_toff_messages=toff_message::whereIn('id', $valid_toff_messageIds)->get();


        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        if($is_search_result)
            return view("reports.ajax.delivery_mistakes_content")->with('canceled_toff_meadis', $canceled_toff_meadis)->with('canceled_toff_messages', $canceled_toff_messages)->with('changed_toff_meadis', $changed_toff_meadis)->with('changed_toff_messages', $changed_toff_messages)->with('reportPeriods', $reportPeriods)->with('days', $days);
            
        if($request->ajax())
        return view("reports.ajax.delivery_mistakes")->with('canceled_toff_meadis', $canceled_toff_meadis)->with('canceled_toff_messages', $canceled_toff_messages)->with('changed_toff_meadis', $changed_toff_meadis)->with('changed_toff_messages', $changed_toff_messages)->with('reportPeriods', $reportPeriods)->with('days', $days);

       return view("reports.http.delivery_mistakes")->with('canceled_toff_meadis', $canceled_toff_meadis)->with('canceled_toff_messages', $canceled_toff_messages)->with('changed_toff_meadis', $changed_toff_meadis)->with('changed_toff_messages', $changed_toff_messages)->with('reportPeriods', $reportPeriods)->with('days', $days);
    }


    public function top_customers(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $topListSize=$request->topListSize!=null? $request->topListSize: 10;

        $is_search_result=$request->is_search_result;
        $valid_customerIds=array();

        $all_customers=customer::where('isDeleted', 'false')->get();
        foreach ($all_customers as $customer) {
            $customer->calcData=0;//count($customer->toff_meadis) + count($customer->toff_messages);
            $customer->save();
        }

        $all_toff_meadis=toff_meadi::where('isDeleted', 'false')->get();
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;

            $customer=$toff_meadi->customer;
            $customer->calcData+=1;
            $customer->save();

            array_push($valid_customerIds, $customer->id);
        }

        $all_toff_messages=toff_message::where('isDeleted', 'false')->get();
        foreach ($all_toff_messages as $toff_message) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_message->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_message->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_message->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_message->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_message->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_message->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_message->date))
            continue;

            $customer=$toff_message->fromCustomer;
            $customer->calcData+=1;
            $customer->save();

            array_push($valid_customerIds, $customer->id);
        }

        $customers=customer::whereIn('id', $valid_customerIds)->orderBy('calcData', 'desc')->limit($topListSize)->get();
        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        $numbers=Global_var::numbers();

        if($is_search_result)
            return view("reports.ajax.top_customers_content")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
            
        if($request->ajax())
        return view("reports.ajax.top_customers")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);

       return view("reports.http.top_customers")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
    }

    public function new_customers(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $is_search_result=$request->is_search_result;
        $all_customers=customer::where('isDeleted', 'false')->get();
        $valid_customerIds=[];

        foreach ($all_customers as $customer) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($customer->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($customer->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($customer->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($customer->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($customer->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($customer->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $customer->date))
            continue;

            array_push($valid_customerIds, $customer->id);
        }

        $customers=customer::whereIn('id', $valid_customerIds)->get();
        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        if($is_search_result)
            return view("reports.ajax.new_customers_content")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days);
            
        if($request->ajax())
        return view("reports.ajax.new_customers")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days);

       return view("reports.http.new_customers")->with('customers', $customers)->with('reportPeriods', $reportPeriods)->with('days', $days);
    }


    public function toffegna_workrate(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $is_search_result=$request->is_search_result;
        $valid_toffegnaIds=array();

        $all_toffegnas=toffegna::where('isDeleted', 'false')->get();
        foreach ($all_toffegnas as $toffegna) {
            $toffegna->calcData=0;
            $toffegna->investedMoney=0;
            $toffegna->save();
        }

        $all_toff_meadis=toff_meadi::where('isDeleted', 'false')->get();
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;

            $toffegna=$toff_meadi->toffegna;

            $toffegna->calcData+=$toff_meadi->deliveryPrice();/*($toff_meadi->distanceInKilometer * $toff_meadi->pricePerKilometer + $toff_meadi->weatherAddonAmount)*/;//$toff_meadi->totalPrice();
            if($toff_meadi->paymentMethod=='Deposit')
                $toffegna->investedMoney+=$toff_meadi->totalPrice() - $toff_meadi->deliveryPrice();
            $toffegna->save();
        }

        $all_toff_messages=toff_message::where('isDeleted', 'false')->get();
        foreach ($all_toff_messages as $toff_message) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_message->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_message->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_message->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_message->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_message->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_message->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_message->date))
            continue;

            $toffegna=$toff_message->toffegna;
            $toffegna->calcData+=$toff_message->totalPrice();
            if($toff_message->paymentMethod=='Deposit')
                $toffegna->investedMoney+=$toff_message->totalPrice();
            $toffegna->save();
        }

        $toffegnas=toffegna::where('isDeleted', 'false')->get();
        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        if($is_search_result)
            return view("reports.ajax.toffegna_workrate_content")->with('toffegnas', $toffegnas)->with('reportPeriods', $reportPeriods)->with('days', $days);
            
        if($request->ajax())
        return view("reports.ajax.toffegna_workrate")->with('toffegnas', $toffegnas)->with('reportPeriods', $reportPeriods)->with('days', $days);

       return view("reports.http.toffegna_workrate")->with('toffegnas', $toffegnas)->with('reportPeriods', $reportPeriods)->with('days', $days);
    }

    public function top_vendors(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $topListSize=$request->topListSize!=null? $request->topListSize: 10;
        $is_search_result=$request->is_search_result;

        $all_vendors_merchants=vendors_merchant::where('isDeleted', 'false')->get();
        foreach ($all_vendors_merchants as $vendor) {
            $vendor->calcData=0;
            $vendor->save();
        }

        $valid_vendorIds=array();
        $all_toff_meadis=toff_meadi::where('isDeleted', 'false')->get();
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;


            $added_vendorIds=array();
            foreach($toff_meadi->toffMeadiPurchases as $purchase){
            $vendor=$purchase->fromVendor;
            if($vendor!=null){
            if(!Global_var::existsInArray($added_vendorIds, $vendor->id)){
                    $vendors_merchant=vendors_merchant::find($vendor->id);
                    if($vendors_merchant==null)
                        continue;
                    $vendors_merchant->calcData+=1;
                    $vendors_merchant->save();

                    array_push($added_vendorIds, $vendor->id);
                    array_push($valid_vendorIds, $vendor->id);
                }
            }
            }
        }


        $vendor_types=vendor_type::where('isDeleted', 'false')->get();
        $top_vendors_data=array();
        foreach ($vendor_types as $vendor_type) {
            $vendors_merchants=vendors_merchant::where('isDeleted', 'false')->whereIn('id', $valid_vendorIds)->where('vendorTypeId', $vendor_type->id)->orderBy('calcData', 'desc')->limit($topListSize)->get();
            $top_vendors_data[$vendor_type->id]=$vendors_merchants;
        }
        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        $numbers=Global_var::numbers();
        if($is_search_result)
            return view("reports.ajax.top_vendors_content")->with('top_vendors_data', $top_vendors_data)->with('vendor_types', $vendor_types)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
            
        if($request->ajax())
        return view("reports.ajax.top_vendors")->with('top_vendors_data', $top_vendors_data)->with('vendor_types', $vendor_types)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);

       return view("reports.http.top_vendors")->with('top_vendors_data', $top_vendors_data)->with('vendor_types', $vendor_types)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
    }

    public function top_items(Request $request, $context="report")
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $topListSize=$request->topListSize!=null? $request->topListSize: 10;
        $is_search_result=$request->is_search_result;

        $all_reference_items=reference_item::where('isDeleted', 'false')->get();
        foreach ($all_reference_items as $reference_item) {
            $reference_item->calcData=0;
            $reference_item->save();
        }

        $all_toff_meadis=toff_meadi::where('isDeleted', 'false')->get();
        foreach ($all_toff_meadis as $toff_meadi) {
            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;


            foreach($toff_meadi->toffMeadiPurchases as $purchase){
            $item=$purchase->item;
            $reference_item=$item!=null? $item->reference_item: null;
            if($reference_item!=null){
                $reference_item=reference_item::find($reference_item->id);
                if($reference_item==null)
                    continue;
                $reference_item->calcData+=1;
                $reference_item->save();
                }
            }
        }

        $top_items=reference_item::orderBy('calcData', 'desc')->limit($topListSize)->get();

        //if needed in dashboard graph
        if($context=='dashboard'){
            return $top_items;
        }

        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        $numbers=Global_var::numbers();
        if($is_search_result)
            return view("reports.ajax.top_items_content")->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
            
        if($request->ajax())
        return view("reports.ajax.top_items")->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);

       return view("reports.http.top_items")->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('topListSize', $topListSize);
    }

//Dashboard data
    public function dashboardData(Request $request)
    {
        $reportPeriod=null;
        $days=[];
        $date=$request->date;
        if($date==null){
            $reportPeriod=$request->reportPeriod;
            $days=$request->day;
        }
        $is_search_result=$request->is_search_result;

        $vendor_types=vendor_type::where('isDeleted', 'false')->get();
        $vendors_merchants=vendors_merchant::where('isDeleted', 'false')->get();
        $vendors_data=array();
        //initialize to 0
        foreach ($vendor_types as $vendor_type) {
            $vendors_data[$vendor_type->name]=0;
        }

        $transactions_data=array(
                'non_periodic_total_orders'=>0,
                'non_periodic_total_message_orders'=>0,
                'non_periodic_total_customers'=>0,
                'non_periodic_total_vendors'=>count($vendors_merchants),
                'total_orders'=>0,
                'total_sales'=>0,
                'total_profit'=>0,
                'pending_orders'=>0,
                'confirmed_orders'=>0,
                'rejected_orders'=>0,
                'customer_average_ordering'=>0,
                'total_message_orders'=>0,
                'total_message_sales'=>0,
                'total_message_profit'=>0,
                'pending_messages'=>0,
                'confirmed_messages'=>0,
                'rejected_messages'=>0,
                'customer_average_ordering'=>0,
                'male_customers'=>0,
                'female_customers'=>0,
                'unknown_gender_customers'=>0,
                'deposit_customers'=>0,
                'nondeposit_customers'=>0,
                '1_18_customers'=>0,
                '19_25_customers'=>0,
                '26_35_customers'=>0,
                '36_45_customers'=>0,
                '46_70_customers'=>0,
                '71_above_customers'=>0
            );
        $all_toff_meadis=toff_meadi::all();//where('isDeleted', 'false')->get();
        foreach ($all_toff_meadis as $toff_meadi) {
            $transactions_data['non_periodic_total_orders']+=1;

            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_meadi->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_meadi->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_meadi->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_meadi->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_meadi->date))
                continue;

        $ethipic = \App\Global_var::getEthipicDateObject($toff_meadi->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_meadi->date))
            continue;

        if($toff_meadi->isDeleted=='false'){
            $commissionProfit=0;
            $added_vendorIds=array();
            foreach($toff_meadi->toffMeadiPurchases as $purchase){
                $vendor=$purchase->fromVendor;
                $ordersSubTotal = $purchase->quantity * $purchase->singlePrice;
                if($vendor!=null && $vendor->commissionInPercent!=null){
                    $commissionProfit=$ordersSubTotal * $vendor->commissionInPercent/100;
                    $commissionProfit+=round($commissionProfit, 2);
                }
            if(!Global_var::existsInArray($added_vendorIds, $vendor->id)){
                if($vendor!=null && $vendor->vendorType!=null){
                    $vendors_data[$vendor->vendorType->name]+=1;
                    array_push($added_vendorIds, $vendor->id);
                }
            }
            }

            $transactions_data['total_orders']+=1;
            $transactions_data['total_sales']+=$toff_meadi->totalPrice();

            $toffegnaCommissionInPercent=100;
            if($toff_meadi->toffegna!=null && $toff_meadi->toffegna->commissionInPercent!=null)
                $toffegnaCommissionInPercent=$toff_meadi->toffegna->commissionInPercent;
            $commissionFromToffegna=($toffegnaCommissionInPercent/100)*$toff_meadi->deliveryPrice();/*($toff_meadi->distanceInKilometer * $toff_meadi->pricePerKilometer + $toff_meadi->weatherAddonAmount)*/;
            
            $transactions_data['total_profit']+=$commissionProfit + $commissionFromToffegna;
            
            if($toff_meadi->status=='pending')
                $transactions_data['pending_orders']+=1;
            if($toff_meadi->isDeleted=='false')
                $transactions_data['confirmed_orders']+=1;
            }
            else{
                $transactions_data['rejected_orders']+=1;
            }
        }

        $all_toff_messages=toff_message::all();//where('isDeleted', 'false')->get();
        foreach ($all_toff_messages as $toff_message) {
            $transactions_data['non_periodic_total_message_orders']+=1;

            if($reportPeriod=="Year" && !Global_var::isWithInAYear($toff_message->date))
                continue;
            else if($reportPeriod=="Quartile" && !Global_var::isWithInAQuartile($toff_message->date))
                continue;
            else if($reportPeriod=="Month" && !Global_var::isWithInAMonth($toff_message->date))
                continue;
            else if($reportPeriod=="Week" && !Global_var::isWithInAWeek($toff_message->date))
                continue;
            else if($reportPeriod=="Day" && !Global_var::isWithInADay($toff_message->date))
                continue;
        
        $ethipic = \App\Global_var::getEthipicDateObject($toff_message->date);
        $orderDay=explode(",", $ethipic->format(DATE_COOKIE))[0];
        //if($day!=null && $day!=$orderDay)
        if($days!=null && count($days)>0 && !Global_var::existsInArray($days, $orderDay))
            continue;

        if($date!=null && !Global_var::areDatesEqual($date, $toff_message->date))
            continue;

        if($toff_message->isDeleted=='false'){
            $transactions_data['total_message_orders']+=1;
            $transactions_data['total_message_sales']+=$toff_message->totalPrice();

            $toffegnaCommissionInPercent=100;
            if($toff_meadi->toffegna!=null && $toff_meadi->toffegna->commissionInPercent!=null)
                $toffegnaCommissionInPercent=$toff_meadi->toffegna->commissionInPercent;
            $commissionFromToffegna=($toffegnaCommissionInPercent/100)*($toff_message->distanceInKilometer * $toff_message->pricePerKilometer + $toff_message->weatherAddonAmount);

            $transactions_data['total_message_profit']+=$commissionFromToffegna;
        
            if($toff_message->status=='pending')
                $transactions_data['pending_messages']+=1;
            if($toff_message->isDeleted=='false')
                $transactions_data['confirmed_messages']+=1;
            }
            else{
                $transactions_data['rejected_messages']+=1;
            }
        }

        $all_customers=customer::where('isDeleted', 'false');
        if(count($all_customers->get())>0)
            $transactions_data['customer_average_ordering']=round($transactions_data['total_orders']/count($all_customers->get()), 2);
        $transactions_data['male_customers']=count(customer::where('isDeleted', 'false')->where('gender', 'Male')->get());
        $transactions_data['female_customers']=count(customer::where('isDeleted', 'false')->where('gender', 'Female')->get());
        $transactions_data['unknown_gender_customers']=count(customer::where('isDeleted', 'false')->where('gender', null)->get());

        $new_customers_in_day=array();
        $new_customers_in_week=array();
        $new_customers_in_month=array();
        $new_customers_in_quartile=array();
        $new_customers_in_year=array();
        $new_customers_in_10_years=array();
        foreach (customer::where('isDeleted', 'false')->get() as $customer) {
            $transactions_data['non_periodic_total_customers']+=1;

            if(count($customer->deposits)/* + count($customer->allowedDeposits)*/ > 0)
                $transactions_data['deposit_customers']+=1;
            else
                $transactions_data['nondeposit_customers']+=1;
            
            if($customer->birthDate!=null){
                if(Global_var::isWithInYearsRange($customer->birthDate, 1, 18))
                    $transactions_data['1_18_customers']+=1;
                if(Global_var::isWithInYearsRange($customer->birthDate, 19, 25))
                   $transactions_data['19_25_customers']+=1;
                if(Global_var::isWithInYearsRange($customer->birthDate, 26, 35))
                    $transactions_data['26_35_customers']+=1;
                if(Global_var::isWithInYearsRange($customer->birthDate, 36, 45))
                    $transactions_data['36_45_customers']+=1;
                if(Global_var::isWithInYearsRange($customer->birthDate, 46, 70))
                    $transactions_data['46_70_customers']+=1;
                if(Global_var::isWithInYearsRange($customer->birthDate, 71, 200))
                    $transactions_data['71_above_customers']+=1;
                }
                
                //for graph
                if(Global_var::isWithInAYear($customer->date, 10))
                    array_push($new_customers_in_10_years, $customer);
                if(Global_var::isWithInAYear($customer->date))
                    array_push($new_customers_in_year, $customer);
                if(Global_var::isWithInAQuartile($customer->date))
                    array_push($new_customers_in_quartile, $customer);
                if(Global_var::isWithInAMonth($customer->date))
                    array_push($new_customers_in_month, $customer);
                if(Global_var::isWithInAWeek($customer->date))
                    array_push($new_customers_in_week, $customer);
                if(Global_var::isWithInADay($customer->date))
                    array_push($new_customers_in_day, $customer);
                
        }

        ////////////////////////////////////
        $vendors=vendors_merchant::where('isDeleted', 'false')->get();
        $new_vendors_in_day=array();
        $new_vendors_in_week=array();
        $new_vendors_in_month=array();
        $new_vendors_in_quartile=array();
        $new_vendors_in_year=array();
        $new_vendors_in_10_years=array();
        foreach ($vendors as $vendor) {
             //for graph
                if(Global_var::isWithInAYear($vendor->date, 10))
                    array_push($new_vendors_in_10_years, $vendor);
                if(Global_var::isWithInAYear($vendor->date))
                    array_push($new_vendors_in_year, $vendor);
                if(Global_var::isWithInAQuartile($vendor->date))
                    array_push($new_vendors_in_quartile, $vendor);
                if(Global_var::isWithInAMonth($vendor->date))
                    array_push($new_vendors_in_month, $vendor);
                if(Global_var::isWithInAWeek($vendor->date))
                    array_push($new_vendors_in_week, $vendor);
                if(Global_var::isWithInADay($vendor->date))
                    array_push($new_vendors_in_day, $vendor);
        }

        $top_items=$this->top_items($request, 'dashboard');

        $reportPeriods=Global_var::reportPeriods();
        $days=Global_var::days();
        $numbers=Global_var::numbers();

        if($is_search_result)
            return view("dashboards.ajax.home_partial")->with('transactions_data', $transactions_data)->with('vendors_data', $vendors_data)->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('new_customers_in_10_years', $new_customers_in_10_years)->with('new_customers_in_year', $new_customers_in_year)->with('new_customers_in_quartile', $new_customers_in_quartile)->with('new_customers_in_month', $new_customers_in_month)->with('new_customers_in_week', $new_customers_in_week)->with('new_customers_in_day', $new_customers_in_day)->with('new_vendors_in_10_years', $new_vendors_in_10_years)->with('new_vendors_in_year', $new_vendors_in_year)->with('new_vendors_in_quartile', $new_vendors_in_quartile)->with('new_vendors_in_month', $new_vendors_in_month)->with('new_vendors_in_week', $new_vendors_in_week)->with('new_vendors_in_day', $new_vendors_in_day);
            
        if($request->ajax())
        return view("dashboards.ajax.home")->with('transactions_data', $transactions_data)->with('vendors_data', $vendors_data)->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('new_customers_in_10_years', $new_customers_in_10_years)->with('new_customers_in_year', $new_customers_in_year)->with('new_customers_in_quartile', $new_customers_in_quartile)->with('new_customers_in_month', $new_customers_in_month)->with('new_customers_in_week', $new_customers_in_week)->with('new_customers_in_day', $new_customers_in_day)->with('new_vendors_in_10_years', $new_vendors_in_10_years)->with('new_vendors_in_year', $new_vendors_in_year)->with('new_vendors_in_quartile', $new_vendors_in_quartile)->with('new_vendors_in_month', $new_vendors_in_month)->with('new_vendors_in_week', $new_vendors_in_week)->with('new_vendors_in_day', $new_vendors_in_day);

       return view("dashboards.http.home")->with('transactions_data', $transactions_data)->with('vendors_data', $vendors_data)->with('top_items', $top_items)->with('reportPeriods', $reportPeriods)->with('days', $days)->with('numbers', $numbers)->with('new_customers_in_10_years', $new_customers_in_10_years)->with('new_customers_in_year', $new_customers_in_year)->with('new_customers_in_quartile', $new_customers_in_quartile)->with('new_customers_in_month', $new_customers_in_month)->with('new_customers_in_week', $new_customers_in_week)->with('new_customers_in_day', $new_customers_in_day)->with('new_vendors_in_10_years', $new_vendors_in_10_years)->with('new_vendors_in_year', $new_vendors_in_year)->with('new_vendors_in_quartile', $new_vendors_in_quartile)->with('new_vendors_in_month', $new_vendors_in_month)->with('new_vendors_in_week', $new_vendors_in_week)->with('new_vendors_in_day', $new_vendors_in_day);
    }



}
