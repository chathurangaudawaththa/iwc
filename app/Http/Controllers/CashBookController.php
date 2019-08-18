<?php

namespace App\Http\Controllers;

use App\CashBook;
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

class CashBookController extends Controller
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
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function show(CashBook $cashBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CashBook $cashBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashBook $cashBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashBook  $cashBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashBook $cashBook)
    {
        //
    }
}
