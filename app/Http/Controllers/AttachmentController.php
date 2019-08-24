<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Response;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use \Exception;
use Storage;
use \Response;


class AttachmentController extends Controller
{
    //
    public function getFile(Request $request){
        $link_url = $request->input('link_url');
        $file_original_name = $request->input('link_url');
        //$link_url = Storage::url( $link_url );
        //return Storage::download($link_url, $name = null, $headers = null);
        
        if(Storage::exists($link_url)){
            return Storage::download($link_url, $file_original_name);
        } 
    }
    
    public function showFile(Request $request, $filename){
        //$path = explode('/', $filename);
        //$path = storage_path($filename);
        $filename = str_replace('/', DIRECTORY_SEPARATOR, $filename); 
        if (!Storage::exists($filename)) {
            abort(404);
        }
        $file = Storage::get($filename);
        $type = Storage::mimeType($filename);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
