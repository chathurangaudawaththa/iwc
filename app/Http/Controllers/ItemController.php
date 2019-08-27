<?php

namespace App\Http\Controllers;

use App\Item;
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

use App\Stock;

class ItemController extends Controller
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
        if(view()->exists('pages.addItem')){
            return View::make('pages.addItem', array());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $itemObject = new Item();
        $itemObjectArray = array();
        
        $query = $itemObject->with( array('rack', 'deck', 'measuringUnit', 'stocks') )
            ->where('is_visible', '=', true);
        
        //$query = $query->whereHas('tables', function($query){});
        
        $itemObjectArray = $query->get();
        
        if(view()->exists('pages.stockControl')){
            return View::make('pages.stockControl', array('itemObjectArray' => $itemObjectArray));
        }
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
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        // validate the info, create rules for the inputs
        $rules = array(
            'code'    => 'required|unique:items',
            'name'    => 'required|unique:items',
            'quantity' => 'required|integer|min:0',
            'quantity_low' => 'required|integer|min:0',
            'measuring_unit_id' => 'required',
            'rack_id' => 'required',
            'deck_id' => 'required',
            'image_uri' => 'required|max:100',

        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            
            // notify()->flash(
            //     'Error', 
            //     'warning', [
            //     'timer' => $data['timer'],
            //     'text' => 'error',
            // ]);
            
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
                    'name' => $request->input('name'),
                    'code' => $request->input('code'),
                    'quantity_low' => $request->input('quantity_low'),
                    'is_rentable' => $request->input('is_rentable'),
                    'unit_price' => $request->input('unit_price'),
                    'measuring_unit_id' => $request->input('measuring_unit_id'),
                    'rack_id' => $request->input('rack_id'),
                    'deck_id' => $request->get('deck_id')
                );
                
                $image_uri_input = $request->file('image_uri');
                
                // file input
                if( ($image_uri_input) ){
                    $file_original_name = $image_uri_input->getClientOriginalName();
                    $file_extension = $image_uri_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    $dataArray['image_uri'] = $filename;
                }
                
                DB::transaction(function () use ($request, $dataArray, $date_today){
                    $newItemObject = Item::create( $dataArray );
                    
                    unset($dataArray);
                    $dataArray = array(
                        'is_visible' => true,
                        'item_id' => $newItemObject->id,
                        'quantity' => $request->input('quantity'),
                        //'date_create' => $request->input('date_create'),
                        'date_create' => $date_today,
                        'measuring_unit_id' => $newItemObject->measuring_unit_id,
                        'transaction_type_id' => ($request->input('transaction_type_id'))?$request->input('transaction_type_id'):2
                    );
                    $newStockObject = Stock::create( $dataArray );
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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, Request $request)
    {
        //
        $itemClone = clone $item;
        if(view()->exists('pages.item_edit')){
            return View::make('pages.item_edit', array('itemObject' => $itemClone));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        
        $itemClone = clone $item;
        // validate the info, create rules for the inputs
        $rules = array(
            'code'    => 'required',
            'name'    => 'required',
            'quantity' => 'required',
            'measuring_unit_id' => 'required',
            'rack_id' => 'required',
            'deck_id' => 'required',
            //'image_uri' => 'required|max:100',
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
                    'name' => $request->input('name'),
                    'code' => $request->input('code'),
                    'quantity_low' => $request->input('quantity_low'),
                    'is_rentable' => $request->input('is_rentable'),
                    'unit_price' => $request->input('unit_price'),
                    'measuring_unit_id' => $request->input('measuring_unit_id'),
                    'rack_id' => $request->input('rack_id'),
                    'deck_id' => $request->get('deck_id')
                );
                
                $image_uri_input = $request->file('image_uri');
                
                // file input
                if( ($image_uri_input) ){
                    if(Storage::exists($itemClone->image_uri)){
                        chmod(Storage::path($itemClone->image_uri), 755);
                        Storage::delete( $itemClone->image_uri );
                    }
                    
                    $file_original_name = $image_uri_input->getClientOriginalName();
                    $file_extension = $image_uri_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    $dataArray['image_uri'] = $filename;
                }
                
                DB::transaction(function () use ($itemClone, $request, $dataArray, $date_today){
                    $itemClone->update( $dataArray );
                    
                    unset($dataArray);
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
        //return redirect()->back();
        return $this->create();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item, Request $request)
    {
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        
        $itemClone = clone $item;
        
        try {
                
            $app_file_storage_uri = config('app.app_file_storage_uri');
            $date_today = Carbon::now();//->format('Y-m-d');

            //create directory
            if(!Storage::exists($app_file_storage_uri)) {
                Storage::makeDirectory($app_file_storage_uri, 0775, true); //creates directory
            }

            $dataArray = array(
                'is_visible' => false
            );

            DB::transaction(function () use ($request, $dataArray, $itemClone){
                $itemClone->update( $dataArray );
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
        
        notify()->flash(
            'Success', 
            'success', [
            'timer' => $data['timer'],
            'text' => 'success',
        ]);
        
        //return Response::json( $data );
        return redirect()->back();
    }
}
