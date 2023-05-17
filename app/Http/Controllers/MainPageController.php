<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainPageController extends Controller
{
    public function getMainPage()
    {
        return view('mainPage');
    }
}
