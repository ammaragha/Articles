<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\catigory;
use App\artical;
class cpCtrl extends Controller
{
    function index()
    {
        if(Auth::check() && Auth::user()->role == 9){
            $cats   = Catigory::get();
            $arts   = Artical::get();
            return view('backEnd.index')
                                ->withCats($cats)
                                ->withArts($arts);
        }
        else
            return Redirect::back();
    }

    
}
