<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use \Exception;
use Illuminate\Support\Facades\Storage;

use App\ItemIssue;
use App\ItemReceive;
use App\Item;

class ReportController extends Controller
{
    //
    public function create(Request $request)
    {
        //
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemObject = new Item();
        $itemIssueObject = new ItemIssue();
        $dataArray = array();
        
        $date_start = $request->input('date_start');
        $date_end = $request->input('date_end');
        $report_type = $request->input('report_type');
        
        switch( $report_type ){
            case "supply_employee": {
                if(view()->exists('pages.print_report_supply_employee')){
                    return View::make('pages.print_report_supply_employee', array(
                        'date_start' => $date_start,
                        'date_end' => $date_end
                    ));
                }
                break;
            }  
            case "supply_customer": {
                if(view()->exists('pages.print_report_supply_customer')){
                    return View::make('pages.print_report_supply_customer', array(
                        'date_start' => $date_start,
                        'date_end' => $date_end
                    ));
                }
                break;
            }  
            case "cash_book": {
                $itemReceiveObject = new ItemReceive();
                $itemReceiveObjectArray = array();
                
                $query = $itemReceiveObject->with( array('itemReceiveDatas', 'user', 'itemIssue') )
                    ->where('is_visible', '=', true)
                    ->where('transaction_type_id', '=', 7)
                    ->whereDate('date_create', '>=', $date_start)
                    ->whereDate('date_create', '<=', $date_end);
                $itemReceiveObjectArray = $query->get();

                if(view()->exists('pages.print_report_cashbook')){
                    return View::make('pages.print_report_cashbook', array(
                        'itemReceiveObjectArray' => $itemReceiveObjectArray,
                        'date_start' => $date_start,
                        'date_end' => $date_end
                    ));
                }
                break;
            }  
            case "stock_item": {
                if(view()->exists('pages.print_report_stock_item')){
                    return View::make('pages.print_report_stock_item', array(
                        'date_start' => $date_start,
                        'date_end' => $date_end
                    ));
                }
                break;
            }
            default :{
                //return redirect()->back();
                return redirect()->route('home');
                break;
            }
        }
        
        /*$query = $itemIssueObject->with( array('transactionType', 'customer', 'user', 'itemReceives', 'itemIssueDatas') )
            ->where('is_visible', '=', true)
            ->where('transaction_type_id', '=', 5)
            ->whereDate('date_receive', '<', $date_today->format('Y-m-d'));
        $dataArray["date_receive_count"] = $query->count();
        
        $query = $itemObject->with( array('rack', 'deck', 'measuringUnit', 'stocks') )
            ->where('is_visible', '=', true)
            ->whereHas('stocks', function($query){
                $query = $query->havingRaw('SUM(quantity) <= items.quantity_low');
            });
        $dataArray["quantity_low_count"] = $query->count();
        
        //$query = $query->where(DB::raw('DATE(due_date)'),'<',DB::raw('DATE(done_date)'));
        
        if(view()->exists('pages.Home')){
            return View::make('pages.Home', ['dataArray' => $dataArray]);
        }*/
    }
}
