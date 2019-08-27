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
use DB;
use Carbon\Carbon;
use \Exception;

class LoginController extends Controller
{
    //
    function __construct(){
        /*
        $app_file_storage_uri = config('app.app_file_storage_uri');
        $date_today = Carbon::now();//->format('Y-m-d');
        */
    }
    
    public function index(){}
    
    public function showLogin(){
        if( Auth::check() ){
            return redirect()->route('home');
        }else if(view()->exists('pages.login')){
            return View::make('pages.login');
        }
    }
    
    public function doLogin(Request $request){
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 5000);
        // validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required',
            'password' => 'required|min:3'
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        // if the validator fails, redirect back to the form
        if($validator->fails()){
            notify()->flash(
                'Admin Login', 
                'warning', [
                'timer' => $data['timer'],
                'text' => 'Invalid Username or Password',
            ]);
            
            return redirect()->back()
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        }else{
            $username = urldecode($request->input('username'));
            $password = urldecode($request->input('password'));
            // attempt to do the login
            $credentials = array(
                'username' => $username,
                'password' => $password
            );
            
            Auth::attempt($credentials);
            
            if( auth()->check() ){

                
                return redirect()->route('home');
            }else{
                
                return redirect()->back()->withInput(Input::except('password'));
            }
            
        }
    }
    
    public function doLogout(Request $request){
        //
        $data = array('title' => 'title', 'text' => 'text', 'type' => 'default', 'timer' => 3000);
        
        Auth::logout();
        //$exitCode = Artisan::call('cache:clear');
        
        // notify()->flash(
        //     'Success', 
        //     'success', [
        //     'timer' => $data['timer'],
        //     'text' => 'success',
        // ]);
        
        return redirect()->route('login.showLogin');
    }
    
}
