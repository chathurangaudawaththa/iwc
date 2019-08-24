<?php

namespace App\Http\Controllers;

use App\ItemIssueData;
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

class ItemIssueDataController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemIssueData  $itemIssueData
     * @return \Illuminate\Http\Response
     */
    public function show(ItemIssueData $itemIssueData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemIssueData  $itemIssueData
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemIssueData $itemIssueData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemIssueData  $itemIssueData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemIssueData $itemIssueData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemIssueData  $itemIssueData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemIssueData $itemIssueData)
    {
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        
        $itemIssueDataClone = clone $itemIssueData;
        
        try {

            DB::transaction(function () use ($itemIssueDataClone){
                $itemIssueDataClone->delete();
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
