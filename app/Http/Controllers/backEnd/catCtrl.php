<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catigory;
use Redirect;
use Session;
use Validator;

class catCtrl extends Controller
{
    public function index()
    {
        if(isset($_GET['search'])){
            $data = catigory::where('name','LIKE',"%".$_GET['search']."%")->get();
        }else{
            $data = catigory::get();
        }
        return view('backEnd.catigories.index')->withData($data);
    }

    public function add()
    {
        return view('backEnd.catigories.addCat');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'catName' =>['required','max:20']
        ],[
            'catName.max' =>'Catirgory name must be less than 20 char',
            'catName.required' => 'Catigory required!'
        ])->validate();

        if(isset($errors)){
            return Redirect::back();
        }else{
            try {
                $description        = $request->input('catDesc');
                if($description == null)
                    $description    = "no description";
                $row = new catigory;
                $row->name          = $request->input('catName');
                $row->sort          = $request->input('catSort');
                $row->description   = $description;

                $row->save();
                Session::flash('k','Catigory has been added :)');
            } catch (\Exeception $e) {
                Session::flash('err',"Catigory not added :'(");
            }

            return Redirect::back();
        }
    }

    public function edit($id)
    {
        try {
            $data = catigory::find($id);
            return view('backEnd.catigories.editCat')->withCat($data);
        } catch (\Exeception $e) {
            Session::flash('err',"there is no Catigory with this id :/");
            return Redirect::back();
        }
    }

    public function update($id, Request $request)
    {
        Validator::make($request->all(),[
            'catName' =>['required','max:20']
        ],[
            'catName.max' =>'Catirgory name must be less than 20 char',
            'catName.required' => 'Catigory required!'
        ])->validate();

        if(isset($errors)){
            return Redirect::back();
        }else{
            try {
                $description        = $request->input('catDesc');
                if($description == null)
                    $description    = "no description";
                $row =  catigory::find($id);
                $row->name          = $request->input('catName');
                $row->sort          = $request->input('catSort');
                $row->description   = $description;

                $row->save();
                Session::flash('k','Catigory has been updated :)');
            } catch (\Exeception $e) {
                Session::flash('err',"Catigory not updated :'(");
            }

            return Redirect::back();
        }
    }


    public function destroy($id)
    {
        try {
            catigory::find($id)->delete();
            Session::flash('k','deleted');
        } catch (\Exeception $th) {
            Session::flash('err',"not deleted");
        }

        return Redirect::back();
    }
}
