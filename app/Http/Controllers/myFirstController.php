<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // это указывать необязательно??!!

class MyFirstController extends Controller 
{
    public function show($id)
    {
        // echo 'ABOUT';
        echo $id;
    }
}