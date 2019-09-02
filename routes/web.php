<?php
// user registration
Route::get('/adduser', function()
{
   return View::make('pages.addUser');
});
Route::post('/add-user', 'UserController@AddUser');
// user login
Route::post('/conf', 'UserController@LogUser');

/*
Route::get('user/{name?}', function ($name = null) {
    return $name;
});
*/
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
    // create item
    Route::get('stock', array('uses' => 'ItemController@create'))->name('item.create');
    // create item
    Route::post('items/create', array('uses' => 'ItemController@store'))->name('item.store');
    // stock item store
    Route::post('stocks/items/store', array('uses' => 'StockController@store'))->name('stock.store');
    // create employee
    Route::get('emp/{itemIssue?}', array('uses' => 'EmployeeController@create'))->where('itemIssue', '[0-9]+')->name('employee.create');
    // create employee
    Route::post('emp', array('uses' => 'EmployeeController@store'))->name('employee.store');
    // create customer
    Route::get('rent/{itemIssue?}', array('uses' => 'CustomerController@create'))->where('itemIssue', '[0-9]+')->name('customer.create');
    // create customer
    Route::post('rent', array('uses' => 'CustomerController@store'))->name('customer.store');
    // create item issue
    Route::post('emp/issue', array('uses' => 'ItemIssueController@store'))->name('itemIssue.store');
    // item return employee
    Route::get('handoveremp', array('uses' => 'ItemReceiveEmplyeeController@index'))->name('itemReceiveEmployee.index');
    // item return customer
    Route::get('handover', array('uses' => 'ItemReceiveCustomerController@index'))->name('itemReceiveCustomer.index');
    // item return employee (list item)
    Route::get('eid/{itemIssue}', array('uses' => 'ItemReceiveEmplyeeController@create'))->name('itemReceiveEmployee.create');
    // item return customer (list item)
    Route::get('id/{itemIssue}', array('uses' => 'ItemReceiveCustomerController@create'))->name('itemReceiveCustomer.create');
    // item return employee (store)
    Route::post('handoveremp/{itemIssue}', array('uses' => 'ItemReceiveEmplyeeController@store'))->name('itemReceiveEmployee.store');
    // item return customer (store)
    Route::post('invoice/{itemIssue}', array('uses' => 'ItemReceiveCustomerController@createInvoice'))->name('itemReceiveCustomer.createInvoice');
    // item return customer (store)
    Route::post('invoice/store/{itemIssue}', array('uses' => 'ItemReceiveCustomerController@store'))->name('itemReceiveCustomer.store');
    // cash book
    Route::get('payments', array('uses' => 'CashBookController@index'))->name('cashBook.index');
    // item add
    Route::get('item', array('uses' => 'ItemController@index'))->name('item.index');
    // item delete
    Route::get('items/{item}/destroy', array('uses' => 'ItemController@destroy'))->name('item.destroy');
    // item update
    Route::get('items/{item}/edit', array('uses' => 'ItemController@edit'))->name('item.edit');
    Route::post('items/{item}/edit', array('uses' => 'ItemController@update'))->name('item.update');
    // item issue data delete
    Route::get('item-issue-datas/{itemIssueData}/destroy', array('uses' => 'ItemIssueDataController@destroy'))->name('itemIssueData.destroy');
    // update item issue
    Route::post('emp/issue/{itemIssue}/update', array('uses' => 'ItemIssueController@update'))->name('itemIssue.update');
    // dstroy item issue
    Route::get('item-issues/{itemIssue}/destroy', array('uses' => 'ItemIssueController@destroy'))->name('itemIssue.destroy');
    // add employeee
    Route::get('supemp', array('uses' => 'EmployeeController@index'))->name('employee.index');
    // report
    Route::get('report', array('uses' => 'ReportController@create'))->name('report.create');
});

Route::get('storage/{filename}', array('uses' => 'AttachmentController@showFile'))->where(['filename' => '.*']);