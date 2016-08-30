<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $isHome = true;
        
        return view('pages.index')->with(compact('isHome'));
    }
}
