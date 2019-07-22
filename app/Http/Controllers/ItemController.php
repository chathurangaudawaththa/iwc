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

class ItemController extends Controller
{
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
        $itemObject = new Item();
        $itemObjectArray = array();
        
        $query = $itemObject->with( array('rack', 'deck', 'measuringUnit', 'stocks') )
            ->where('is_visible', '=', true);
        
        //$query = $query->whereHas('stocks', function($query){});
        
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
            'name'    => 'required|unique:items'
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
                
                DB::transaction(function () use ($dataArray){
                    Item::create( $dataArray );
                });
                
            }catch(Exception $e){dd($e);
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
    public function edit(Item $item)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
