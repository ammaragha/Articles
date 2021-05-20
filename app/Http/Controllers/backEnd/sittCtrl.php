<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\slug;
use Redirect;
use Session;


class sittCtrl extends Controller
{
    public function index()
    {
    	$data = slug::get();
    	return view('backEnd.sittings.index')->withslugs($data);
    }

    public function update(Request $request)
    {
    	try{
    		$slugs = slug::get();
    		foreach ($slugs as $key => $slug) {
    			$slug->content = $request->input('content'.$slug['id']);
    			$slug->save();
    		}
    		Session::flash('k',' Updated..');

    	}catch(\Exception $e){
    		Session::flash('err','Something wrong');
    	}

    	return Redirect::back();
    }
}
