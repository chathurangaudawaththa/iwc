<?php

namespace App\Http\Controllers;

use App\MeasuringUnit;
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

class MeasuringUnitController extends Controller
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
     * @param  \App\MeasuringUnit  $measuringUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MeasuringUnit $measuringUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MeasuringUnit  $measuringUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(MeasuringUnit $measuringUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MeasuringUnit  $measuringUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeasuringUnit $measuringUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MeasuringUnit  $measuringUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeasuringUnit $measuringUnit)
    {
        //
    }
}
