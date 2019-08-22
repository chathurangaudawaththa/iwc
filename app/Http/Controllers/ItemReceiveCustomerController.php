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
use App\CashBook;

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
        $auth_user = auth()->user();
        $date_today = Carbon::now();//->format('Y-m-d');
        
        $itemIssueObjectClone = clone $itemIssue;
        $itemReceiveObject = new ItemReceive();
        $itemReceiveDataArray = array();
        
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        // validate the info, create rules for the inputs
        $rules = array(
            'transaction_type_id'    => 'required'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            
            notify()->flash(
                'Error', 
                'warning', [
                'timer' => $data['timer'],
                'text' => 'error',
            ]);
            
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
            
        } else {
            // do process
            try {
                
                $app_file_storage_uri = config('app.app_file_storage_uri');
                $date_today = Carbon::now();//->format('Y-m-d');
                
                //create directory
                if(!Storage::exists($app_file_storage_uri)) {
                    Storage::makeDirectory($app_file_storage_uri, 0775, true); //creates directory
                }
                
                $dataArray = array(
                    'is_visible' => true,
                    'is_active' => true,
                    'date_create' => ($request->input('date_create')) ? Carbon::createFromFormat('m/d/Y', $request->input('date_create'))->toDateTimeString() : $date_today->format('Y-m-d'),
                    'amount' => $request->input('amount'),
                    'discount' => $request->input('discount'),
                    'damage_charge' => $request->input('damage_charge'),
                    'delivery_charge' => $request->input('delivery_charge'),
                    'user_id_create' => $auth_user->id,
                    'item_issue_id' => $itemIssueObjectClone->id,
                    'transaction_type_id' => $request->input('transaction_type_id')
                );
                
                DB::transaction(function () use ($dataArray, $request, &$itemReceiveObject, &$itemReceiveDataArray){
                    $quantity_key_temp = "quantity_";
                    $item_issue_data_id_array = array();
                    $itemReceiveObject = $itemReceiveObject->create( $dataArray );
                    unset($dataArray);
                    $item_issue_data_id_array = (array) $request->input('item_issue_data_id');
                    
                    foreach($item_issue_data_id_array as $key => $value){
                        $quantity_key = $quantity_key_temp . $value;

                        $tempItemIssueData = ItemIssueData::find( $value );
                        $tempItemIssueDataQuantity = $request->input( $quantity_key );
                        $tempItem = $tempItemIssueData->item;
                        
                        $dataArray = array(
                            'is_visible' => true,
                            'is_active' => true,
                            'item_receive_id' => $itemReceiveObject->id,
                            'quantity' => $tempItemIssueDataQuantity,
                            'item_id' => $tempItem->id,
                            'measuring_unit_id' => $tempItem->measuring_unit_id,
                            'unit_price' => $tempItem->unit_price
                        );
                        
                        $newItemReceiveData = ItemReceiveData::create( $dataArray );
                        unset($dataArray);
                        
                        $dataArray = array(
                            'is_visible' => true,
                            'quantity' => (+1 * $newItemReceiveData->quantity),
                            'date_create' => $itemReceiveObject->date_create,
                            'item_id' => $newItemReceiveData->item_id,
                            'measuring_unit_id' => $newItemReceiveData->measuring_unit_id
                        );
                        
                        $newStock = Stock::create( $dataArray );
                        unset($dataArray);
                        
                        $tempAmount = ( ($itemReceiveObject->amount + $itemReceiveObject->delivery_charge + $itemReceiveObject->damage_charge) - $itemReceiveObject->discount );
                        $dataArray = array(
                            'is_visible' => true,
                            'amount' => $tempAmount,
                            'date_create' => $itemReceiveObject->date_create
                        );
                        
                        $newCashBook = CashBook::create( $dataArray );
                        unset($dataArray);
                        
                        $itemReceiveDataArrayTemp = array(
                            'item_receive_data_object' => $newItemReceiveData
                        );

                        array_push( $itemReceiveDataArray, $itemReceiveDataArrayTemp );
                    }
                    
                });
                
            }catch(Exception $e){
                notify()->flash(
                    'Error', 
                    'warning', [
                    'timer' => $data['timer'],
                    'text' => 'error',
                ]);
                
                return redirect()
                    ->back()
                    ->withInput();
            }
        }
        /*
        notify()->flash(
            'Success', 
            'success', [
            'timer' => $data['timer'],
            'text' => 'success',
        ]);
        */
        //return Response::json( $data );
        //return redirect()->back();
        if(view()->exists('pages.printInvoice')){
            return View::make('pages.printInvoice', array(
                'date_today' => $date_today,
                'itemReceiveObject' => $itemReceiveObject,
                'itemReceiveDataArray' => $itemReceiveDataArray
            ));
        }
    }
    
}
