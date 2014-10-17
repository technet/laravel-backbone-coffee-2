<?php


Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api'), function()
{
	Route::resource('categories', 'CategoryController');
});


Route::get('categories', function() {
    return View::make('categories')->with('headerCaption', 'Categories');
});
