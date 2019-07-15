<?php
// user registration
Route::get('/adduser', function()
{
   return View::make('pages.addUser');
});
Route::post('/add-user', 'UserController@AddUser');
// user login
Route::post('/conf', 'UserController@LogUser');
// logout
Route::get('/logout', function(){
   Auth::logout();
   return View::make('pages.login');
});
// home page
Route::get('/', function()
{
    if (Auth::check()) {
       return View::make('pages.Home');
    }
    return view('pages.login');
});

// stock control
Route::get('/stock', function()
{
    if (Auth::check()) {
      return View::make('pages.stockControl');
   }
    return view('pages.login');
});

// employee control
Route::get('/emp', function()
{
    if (Auth::check()) {
      return View::make('pages.employeeControl');
   }
    return view('pages.login');
});

// stock control
Route::get('/rent', function()
{
    if (Auth::check()) {
      return View::make('pages.rentControl');
   }
    return view('pages.login');
});

// stock control
Route::get('/id', function()
{
    if (Auth::check()) {
      return View::make('pages.clientView');
   }
    return view('pages.login');
});

// stock control
Route::get('/eid', function()
{
    if (Auth::check()) {
      return View::make('pages.empView');
   }
    return view('pages.login');
});

// stock control
Route::get('/invoice', function()
{
    if (Auth::check()) {
      return View::make('pages.invoice');
   }
    return view('pages.login');
});

// stock control
Route::get('/print', function()
{
    if (Auth::check()) {
      return View::make('pages.printInvoice');
   }
    return view('pages.login');
});

// stock control
Route::get('/handover', function()
{
    if (Auth::check()) {
      return View::make('pages.handoverItems');
   }
    return view('pages.login');
});

// stock control
Route::get('/handoveremp', function()
{
    if (Auth::check()) {
      return View::make('pages.handoveremp');
   }
    return view('pages.login');
});

// stock control
Route::get('/payments', function()
{
    if (Auth::check()) {
      return View::make('pages.paymentHistory');
   }
    return view('pages.login');
});
