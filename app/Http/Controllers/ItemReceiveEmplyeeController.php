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

class ItemReceiveEmplyeeController extends Controller
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
            ->where('transaction_type_id', '=', 4);
        $itemIssueObjectArray = $query->get();
        
        if(view()->exists('pages.handoveremp')){
            return View::make('pages.handoveremp', array(
                'itemIssueObjectArray' => $itemIssueObjectArray
            ));
        }
    }
    
    public function create(Request $request, ItemIssue $itemIssue){
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemIssueObjectClone = clone $itemIssue;
        
        if(view()->exists('pages.empView')){
            return View::make('pages.empView', array(
                'itemIssueObject' => $itemIssueObjectClone
            ));
        }
    }
    
    public function store(Request $request, ItemIssue $itemIssue){
        
        $itemIssueObjectClone = clone $itemIssue;
        
        $item_id_array = (array) $request->input('item_id');
        $quantity_array = (array) $request->input('quantity');
        dd( array($item_id_array, $quantity_array) );
        
    }
    
}
