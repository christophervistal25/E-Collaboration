<?php


Route::get('/', 'HomeController@index');

Route::resource('/boards', 'BoardController');
Route::resource('/cards', 'CardController');
Route::resource('/tasks', 'TaskController');
