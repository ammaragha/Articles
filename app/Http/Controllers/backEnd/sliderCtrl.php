<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\slider;
use Validator;
use Redirect;
use Session;
use File;
use DB;

class sliderCtrl extends Controller
{
    public function index()
    {
    	$data = DB::table('sliders')->orderBy('sort','asc')->get();
    	return view('backEnd.sliders.index')->withdata($data);
    }



    public function add()
    {
    	return view('backEnd.sliders.add');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title'   =>'required|max:20',
            'content'   =>'required|max:255',
            'image' => 'required|bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        if(isset($errors)){
            return Redirect::back();
        }else{
            $row = new slider;
            try {
                $row->title          = $request->input('title');
                $row->content       = $request->input('content');
                $row->sort         = $request->input('sort');

                //if image exists
                if($request->hasFile('image')){
                    $image          = $request->file('image');
                    $name           = time().".".$image->getClientOriginalExtension();
                    $path           = 'backEnd/sliderImages/';
                    $image->move($path, $name);
                    $row->img     = $path.$name;
                }

                $row->save();

                Session::flash('k',"Slider Uploaded :D");

            } catch (\Exeception $th) {
                Session::flash('err','Nothing Uploaded x)');
            }
            return Redirect::back();
        }
    }


    public function edit($id)
    {
        $data = slider::find($id);
        return view('backEnd.sliders.edit')
                            ->withdata($data);
    }


    public function update(Request $request, $id)
    {
        
        Validator::make($request->all(),[
            'title'   =>'required|max:20',
            'content'   =>'required|max:255',
            'image' => 'nullable|bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        if(isset($errors)){
            return Redirect::back();
        }else{
            $row = slider::find($id);
            try {
                $row->title          = $request->input('title');
                $row->content       = $request->input('content');
                $row->sort         = $request->input('sort');

                //if image exists
                if($request->hasFile('image')){
                    $image          = $request->file('image');
                    $name           = time().".".$image->getClientOriginalExtension();
                    $path           = 'backEnd/sliderImages/';
                    $image->move($path, $name);
                    $row->img     = $path.$name;
                }

                $row->save();

                Session::flash('k',"Slider updated :D");

            } catch (\Exeception $th) {
                Session::flash('err','Nothing updated x)');
            }
            return Redirect::back();
        }
    }


    public function destroy($id)
    {
        try {
            $row = slider::find($id);
            File::delete($row->img);
            $row->delete();
            Session::flash('k',"deleted succefully :D");
        } catch (\Execption $th) {
            Session::flash('err',"something went wrong :/");
        }        

        return Redirect::back();
    }
}
