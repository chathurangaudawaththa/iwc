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
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use \Exception;
use Illuminate\Support\Facades\Storage;

use App\ItemIssue;
use App\ItemIssueData;
use App\ItemReceive;
use App\ItemReceiveData;
use App\Item;
use App\Stock;

class ItemReceiveCustomerController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemIssueObject = new ItemIssue();
        $itemIssueObjectArray = array();
        
        $query = $itemIssueObject->with( array('transactionType', 'customer', 'user', 'itemReceives', 'itemIssueDatas') )
            ->where('is_visible', '=', true)
            ->where('transaction_type_id', '=', 5);
        $itemIssueObjectArray = $query->get();
        
        if(view()->exists('pages.handoverItems')){
            return View::make('pages.handoverItems', array(
                'itemIssueObjectArray' => $itemIssueObjectArray
            ));
        }
    }
    
    public function create(Request $request, ItemIssue $itemIssue){
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemIssueObjectClone = clone $itemIssue;
        
        if(view()->exists('pages.clientView')){
            return View::make('pages.clientView', array(
                'itemIssueObject' => $itemIssueObjectClone
            ));
        }
    }
    
    public function createInvoice(Request $request, ItemIssue $itemIssue){
        
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemIssueObjectClone = clone $itemIssue;
        $quantity_key_temp = "quantity_";
        $item_issue_data_id_array = (array) $request->input('item_issue_data_id');
        
        $itemReceiveDataArray = array();
        
        foreach($item_issue_data_id_array as $key => $value){
            $quantity_key = $quantity_key_temp . $value;
            
            $itemReceiveDataArrayTemp = array(
                'item_issue_data_object' => ItemIssueData::find( $value ),
                'item_issue_data_quantity' => $request->input( $quantity_key )
            );
            
            array_push( $itemReceiveDataArray, $itemReceiveDataArrayTemp );
        }
        
        if(view()->exists('pages.invoice')){
            return View::make('pages.invoice', array(
                'date_today' => $date_today,
                'itemIssueObject' => $itemIssueObjectClone,
                'itemReceiveDataArray' => $itemReceiveDataArray
            ));
        }
    }
    
    public function store(Request $request, ItemIssue $itemIssue){
        //
    }
    
}
