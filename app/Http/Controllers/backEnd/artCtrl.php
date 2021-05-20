<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catigory;
use App\artical;
use Redirect;
use Session;
use File;
use Validator;
use Auth;

class artCtrl extends Controller
{
    public function index()
    {
        if(isset($_GET['search'])){
            $data = artical::where('name','LIKE',"%".$_GET['search']."%")->get();
        }else{
            $data = artical::get();
        }
        return view('backEnd.articals.index')->withdata($data);
    }

    public function add()
    {
        $cats = catigory::get();
        return view('backEnd.articals.addArticals')->withCats($cats);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'artName'   =>'required|max:20',
            'artDesc'   =>'required|max:255',
            'artContent'=>'required|max:255',
            'catID'     =>'required',
            'artImage' => 'nullable|bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        if(isset($errors)){
            return Redirect::back();
        }else{
            $row = new artical;
            try {
                $row->name          = $request->input('artName');
                $row->description   = $request->input('artDesc');
                $row->content       = $request->input('artContent');
                $row->catID         = $request->input('catID');
                $row->userID        = Auth::user()->id;

                //if image exists
                if($request->hasFile('artImage')){
                    $image          = $request->file('artImage');
                    $name           = time().".".$image->getClientOriginalExtension();
                    $path           = 'backEnd/articalsImage/';
                    $image->move($path, $name);
                    $row->img     = $path.$name;
                }else{//if not
                    $row->img     = 'backEnd/articalsImage/defulte.jpg';
                }

                $row->save();

                Session::flash('k',"Artical Uploaded :D");

            } catch (\Exeception $th) {
                dd($th);
            }
            return Redirect::back();
        }
    }


    public function edit($id)
    {
        $cats = catigory::get();
        $data = artical::find($id);
        return view('backEnd.articals.editArticals')
                            ->withdata($data)
                            ->withcats($cats);
    }


    public function update(Request $request, $id)
    {
        //check if who edit is onwer
        $onwer = artical::where('id',"=",$id,"AND","userID","=",Auth::user()->id )->get();
        if(count($onwer) >0 ){//now he is real owner :D

            Validator::make($request->all(),[
                'artName'   =>'required|max:20',
                'artDesc'   =>'required|max:255',
                'artContent'=>'required|max:255',
                'catID'     =>'required',
                'artImage' => 'nullable|bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ])->validate();
    
            if(isset($errors)){
                return Redirect::back();
            }else{
                $row = artical::find($id);
                try {
                    $row->name          = $request->input('artName');
                    $row->description   = $request->input('artDesc');
                    $row->content       = $request->input('artContent');
                    $row->catID         = $request->input('catID');
    
                    //if image exists
                    if($request->hasFile('artImage')){
                        $image          = $request->file('artImage');
                        $name           = time().".".$image->getClientOriginalExtension();
                        $path           = 'backEnd/articalsImage/';
                        $image->move($path, $name);
                        File::delete($row->img);
                        $row->img     = $path.$name;
                    }else{//if not
                        //image will still the same :))
                    }
    
                    $row->save();
    
                    Session::flash('k',"Artical Updated :D");
    
                } catch (\Exeception $th) {
                    Session::flash('err',"something went wrong :/");
                }
            }
        }else{// not onwer :/
            Session::flash('err',"this Artical not yours >.>");
        }

        return Redirect::back();
    }


    public function destroy($id)
    {
        try {
            $row = artical::find($id);
            if($row->img != 'backEnd/articalsImage/defulte.jpg'){
                File::delete($row->img);
            }
            $row->delete();
            Session::flash('k',"deleted succefully :D");
        } catch (\Execption $th) {
            Session::flash('err',"something went wrong :/");
        }        

        return Redirect::back();
    }
}
