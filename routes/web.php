<?php
// user registration
Route::get('/adduser', function()
{
   return View::make('pages.addUser');
});
Route::post('/add-user', 'UserController@AddUser');
// user login
Route::post('/conf', 'UserController@LogUser');


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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// show files
Route::get('storage/{filename}', array('uses' => 'StorageController@showFile'))->where(['filename' => '.*']);
// route to show the login form
Route::get('logins', array('uses' => 'LoginController@showLogin'))->name('login.showLogin');
// route to process the form
Route::post('logins', array('uses' => 'LoginController@doLogin'))->name('login.doLogin');
// route to procss logout
Route::get('logout', array('uses' => 'LoginController@doLogout'))->name('login.doLogout');

Route::group(['middleware' => array('memberMiddleWare', 'disablePreventBackMiddleware')], function(){
    // show home page
    Route::get('/', array('uses' => 'HomeController@index'))->name('home');
    // create user
    Route::get('users/create', array('uses' => 'UserController@create'))->name('user.create');
    // store user
    Route::post('users/create', array('uses' => 'UserController@store'))->name('user.store');
    //create item
    Route::get('stock', array('uses' => 'ItemController@create'))->name('item.create');
    //create item
    Route::post('items/create', array('uses' => 'ItemController@store'))->name('item.store');
});