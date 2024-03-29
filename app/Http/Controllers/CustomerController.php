<?php

namespace App\Http\Controllers;

use App\Customer;
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
use App\Item;
use App\Stock;

class CustomerController extends Controller
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
    public function create(ItemIssue $itemIssue, Request $request)
    {
        //
        $customerObject = new Customer();
        $itemObject = new Item();
        $itemIssueObject = new ItemIssue();
        $customerObjectArray = array();
        $itemObjectArray = array();
        $itemIssueObjectArray = array();
        
        $query = $customerObject
            ->where('is_visible', '=', true)
            ->where('user_type_id', '=', 3);
        //$query = $query->whereHas('tables', function($query){});
        $customerObjectArray = $query->get();
        
        $query = $itemObject->with( array('rack', 'deck', 'measuringUnit', 'stocks') )
            ->where('is_visible', '=', true);
        $itemObjectArray = $query->get();
        
        $query = $itemIssueObject->with( array('transactionType', 'customer', 'user', 'itemReceives', 'itemIssueDatas') )
            ->where('is_visible', '=', true)
            ->where('transaction_type_id', '=', 5);
        $itemIssueObjectArray = $query->get();
        
        $customer_id = $request->input('customer_id_update');
        
        if(($customer_id) && (is_numeric($customer_id))){
            $customerObject = $customerObject->find( $customer_id );
        }
        
        if(view()->exists('pages.rentControl')){
            return View::make('pages.rentControl', array(
                'customerObjectArray' => $customerObjectArray,
                'itemObjectArray' => $itemObjectArray,
                'itemIssueObjectArray' => $itemIssueObjectArray,
                'itemIssueObject' => $itemIssue,
                'customerObject' => $customerObject
            ));
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
            'nic'    => 'required'
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
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'nic' => $request->input('nic'),
                    'code' => $request->input('code'),
                    'user_type_id' => $request->input('user_type_id')
                );
                
                $image_uri_input = $request->file('image_uri');
                $image_uri_nic_front_input = $request->file('image_uri_nic_front');
                $image_uri_nic_back_input = $request->file('image_uri_nic_back');
                
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
                
                // file input
                if( ($image_uri_nic_front_input) ){
                    $file_original_name = $image_uri_nic_front_input->getClientOriginalName();
                    $file_extension = $image_uri_nic_front_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_nic_front_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    $dataArray['image_uri_nic_front'] = $filename;
                }
                
                // file input
                if( ($image_uri_nic_back_input) ){
                    $file_original_name = $image_uri_nic_back_input->getClientOriginalName();
                    $file_extension = $image_uri_nic_back_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_nic_back_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    $dataArray['image_uri_nic_back'] = $filename;
                }
                
                DB::transaction(function () use ($dataArray){
                    Customer::create( $dataArray );
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Request $request)
    {
        //
        //$customerObject = new Customer();
        $customerObject = clone $customer;
        $itemObject = new Item();
        $itemIssueObject = new ItemIssue();
        $customerObjectArray = array();
        $itemObjectArray = array();
        $itemIssueObjectArray = array();
        
        $query = $customerObject
            ->where('is_visible', '=', true)
            ->where('user_type_id', '=', 3);
        //$query = $query->whereHas('tables', function($query){});
        $customerObjectArray = $query->get();
        
        $query = $itemObject->with( array('rack', 'deck', 'measuringUnit', 'stocks') )
            ->where('is_visible', '=', true);
        $itemObjectArray = $query->get();
        
        $query = $itemIssueObject->with( array('transactionType', 'customer', 'user', 'itemReceives', 'itemIssueDatas') )
            ->where('is_visible', '=', true)
            ->where('transaction_type_id', '=', 5);
        $itemIssueObjectArray = $query->get();
        
        if(view()->exists('pages.rentControl')){
            return View::make('pages.rentControl', array(
                'customerObjectArray' => $customerObjectArray,
                'itemObjectArray' => $itemObjectArray,
                'itemIssueObjectArray' => $itemIssueObjectArray,
                'itemIssueObject' => $itemIssueObject,
                'customerObject' => $customerObject
            ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customerObjectClone = clone $customer;
        
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        // validate the info, create rules for the inputs
        $rules = array(
            //'code'    => 'required'
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
                
                /*
                $dataArray = array(
                    'is_visible' => true,
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'nic' => $request->input('nic'),
                    'code' => $request->input('code'),
                    'user_type_id' => $request->input('user_type_id')
                );
                */
                
                $customerObjectClone->is_visible = true;
                $customerObjectClone->first_name = $request->input('first_name');
                $customerObjectClone->last_name = $request->input('last_name');
                $customerObjectClone->address = $request->input('address');
                $customerObjectClone->phone = $request->input('phone');
                $customerObjectClone->nic = $request->input('nic');
                $customerObjectClone->code = $request->input('code');
                $customerObjectClone->user_type_id = $request->input('user_type_id');
                
                $image_uri_input = $request->file('image_uri');
                $image_uri_nic_front_input = $request->file('image_uri_nic_front');
                $image_uri_nic_back_input = $request->file('image_uri_nic_back');
                
                // file input
                if( ($image_uri_input) ){
                    $file_original_name = $image_uri_input->getClientOriginalName();
                    $file_extension = $image_uri_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    //$dataArray['image_uri'] = $filename;
                    $customerObjectClone->image_uri = $filename;
                }
                
                // file input
                if( ($image_uri_nic_front_input) ){
                    $file_original_name = $image_uri_nic_front_input->getClientOriginalName();
                    $file_extension = $image_uri_nic_front_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_nic_front_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    //$dataArray['image_uri_nic_front'] = $filename;
                    $customerObjectClone->image_uri_nic_front = $filename;
                }
                
                // file input
                if( ($image_uri_nic_back_input) ){
                    $file_original_name = $image_uri_nic_back_input->getClientOriginalName();
                    $file_extension = $image_uri_nic_back_input->getClientOriginalExtension();
                    //$filename = $file->store( $dir );
                    $filename = $image_uri_nic_back_input->storeAs( 
                        $app_file_storage_uri,
                        uniqid( time() ) . '_' . $file_original_name
                    );
                    
                    //$dataArray['image_uri_nic_back'] = $filename;
                    $customerObjectClone->image_uri_nic_back = $filename;
                }
                
                DB::transaction(function () use ($customerObjectClone){
                    $customerObjectClone->save();
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Request $request)
    {
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        
        $customerClone = clone $customer;
        
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

            DB::transaction(function () use ($request, $dataArray, $customerClone){
                $customerClone->update( $dataArray );
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
