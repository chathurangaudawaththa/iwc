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
use App\Item;

class HomeController extends Controller
{
    //
    function __construct(){
        /*
        $app_file_storage_uri = config('app.app_file_storage_uri');
        $date_today = Carbon::now();//->format('Y-m-d');
        */
    }
    
    public function index()
    {
        //
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemObject = new Item();
        $itemIssueObject = new ItemIssue();
        $dataArray = array();
        
        $query = $itemIssueObject->with( array('transactionType', 'customer', 'user', 'itemReceives', 'itemIssueDatas') )
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
        }
    }
}
