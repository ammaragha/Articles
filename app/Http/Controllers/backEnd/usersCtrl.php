<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Validator;
use Session;
use Redirect;
class usersCtrl extends Controller
{
    public function index()
    {
        if(isset($_GET['search'])){
            $data = DB::select('select * from users where lName LIKE ? OR fName LIKE ?', 
                ["%".$_GET['search']."%","%".$_GET['search']."%"] );
        }else{
            $data = User::get();
        }
        return view('backEnd.users.index')->withdata($data);
    }

    public function edit($id)
    {
        $data   = user::find($id);
        return view('backEnd.users.editUser')->withdata($data);
    }


    public function update(Request $request, $id)
    {
        try{
            Validator::make($request->all(),[
                'fName' => 'required|max:10',
                'lName' => 'required',
                'email' => 'required'
            ])->validate();


            if(isset($errors) && count($errors) > 0){
                return Redirect::back();
            }else{
                try {
                    $row = User::find($id);
                    $row->fName = $request->input('fName');
                    $row->lName = $request->input('lName');
                    $row->email = $request->input('email');
                    if(!empty($request->input('password') ) ){
                        $row->password = Hash::make($request->input('password'));   
                    }
                    $row->role = $request->input('role');
                    $row->save();
        
                    Session::flash('k',"User has been updated");
                } catch (\Exception $e) {
                    
                    Session::flash('err',"Email exists");
                }
            }
        }catch(\Exception $th){
            Session::flash('err','something went wrong');
        }
        return Redirect::back();
    }


    public function destroy($id)    
    {
        try{
            User::find($id)->delete();
            Session::flash('k','User Deleted');
        }catch(\Exception $e){
            Session('err','Something went wrong');
        }

        return Redirect::back();
    }
}
