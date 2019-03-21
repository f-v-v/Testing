<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySecondController extends Controller
{
    //
    public function show($id)
    {
        // echo 'ABOUT';
        echo 'SecondController'.$id;
    }
}
