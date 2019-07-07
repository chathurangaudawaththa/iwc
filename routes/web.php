<?php

Route::get('/', function()
{
   return View::make('pages.Home');
});


Route::get('/stock', function()
{
   return View::make('pages.stockControll');
});