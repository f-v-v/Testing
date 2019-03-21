<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// my

Route::get('/page/{cat}/{id}', function ($cat, $id) {
    echo 'id='.$id;
    echo '</br>';
    echo 'cat='.$cat;
})->where(
    [
       'cat'=> '[a-zA-Z]+'
    ]
);

Route::get('/about/{id}', 'MySecondController@show');
