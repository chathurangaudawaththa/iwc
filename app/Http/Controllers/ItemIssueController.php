<?php

namespace App\Http\Controllers;

use App\ItemIssue;
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

use App\ItemIssueData;
use App\Item;
use App\Stock;

class ItemIssueController extends Controller
{
    //
    function __construct(){
        /*
        $app_file_storage_uri = config('app.app_file_storage_uri');
        $date_today = Carbon::now();//->format('Y-m-d');
        */
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $auth_user = auth()->user();
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        // validate the info, create rules for the inputs
        $rules = array(
            'transaction_type_id'    => 'required',
            'customer_id'    => 'required'
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
                    'date_create' => ($request->input('date_create')) ? $request->input('date_create') : $date_today->format('Y-m-d'),
                    'date_receive' => ($request->input('date_receive')) ? $request->input('date_receive') : $date_today->format('Y-m-d'),
                    'user_id_create' => $auth_user->id,
                    'customer_id_create' => $request->input('customer_id'),
                    'transaction_type_id' => $request->input('transaction_type_id')
                );
                
                $itemIdArray = array();
                $quantityArray = array();
                $descriptionArray = array();
                
                DB::transaction(function () use ($dataArray, $request){
                    $newItemIssue = ItemIssue::create( $dataArray );
                    
                    unset($dataArray);
                    $itemIdArray = (array) $request->input('item_id');
                    $quantityArray = (array) $request->input('quantity');
                    $descriptionArray = (array) $request->input('description');
                    
                    foreach($itemIdArray as $key => $value){
                        $tempItem = Item::find( $value );
                        $dataArray = array(
                            'is_visible' => true,
                            'is_active' => true,
                            'item_issue_id' => $newItemIssue->id,
                            'quantity' => $quantityArray[$key],
                            'item_id' => $tempItem->id,
                            'measuring_unit_id' => $tempItem->measuring_unit_id,
                            'unit_price' => $tempItem->unit_price,
                            'description' => $descriptionArray[$key]
                        );
                        
                        $newItemIssueData = ItemIssueData::create( $dataArray );
                        unset($dataArray);
                        
                        $dataArray = array(
                            'is_visible' => true,
                            'quantity' => (-1 * $newItemIssueData->quantity),
                            'date_create' => $newItemIssue->date_create,
                            'item_id' => $newItemIssueData->item_id,
                            'measuring_unit_id' => $newItemIssueData->measuring_unit_id
                        );
                        
                        Stock::create( $dataArray );
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
        
        notify()->flash(
            'Success', 
            'success', [
            'timer' => $data['timer'],
            'text' => 'success',
        ]);
        
        //return Response::json( $data );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemIssue  $itemIssue
     * @return \Illuminate\Http\Response
     */
    public function show(ItemIssue $itemIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemIssue  $itemIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemIssue $itemIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemIssue  $itemIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemIssue $itemIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemIssue  $itemIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemIssue $itemIssue)
    {
        //
    }
}
