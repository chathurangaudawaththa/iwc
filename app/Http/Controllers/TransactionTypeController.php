<?php

namespace App\Http\Controllers;

use App\TransactionType;
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

class TransactionTypeController extends Controller
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
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionType $transactionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $transactionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionType $transactionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionType $transactionType)
    {
        //
    }
}
