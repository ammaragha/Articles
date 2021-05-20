<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\message;
use Session;
use Redirect;

class mesgCtrl extends Controller
{
    public function index()
    {
    	$data = message::get();
    	return view('backEnd.messages.index')->withdata($data);
    	
    }


    public function show($id)
    {
    	$data = message::find($id);
    	$data->seen = '1';
    	$data->save();
    	return view('backEnd.messages.show')->withdata($data);
    }



    public function destroy($id)
    {
    	try {
            $row = message::find($id);
            $row->delete();
            Session::flash('k',"deleted succefully :D");
        } catch (\Execption $th) {
            Session::flash('err',"something went wrong :/");
        }        

        return Redirect::to('admin/messages');
    }
}
