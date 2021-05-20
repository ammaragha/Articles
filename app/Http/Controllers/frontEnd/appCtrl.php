<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catigory;
class appCtrl extends Controller
{
    function index()
    {
        $cats = catigory::get();
        return view('frontEnd.index')->withcats($cats);
    }

    function cat()
    {
        return view('frontEnd.catigories');
    }

  
    function styles()
    {
        return view('frontEnd.styles');
    }

    function about()
    {
        return view('frontEnd.about');
    }

    function contact()
    {
        return view('frontEnd.contact');
    }
}
