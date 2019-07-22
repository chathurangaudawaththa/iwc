<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use \Exception;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    //
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
