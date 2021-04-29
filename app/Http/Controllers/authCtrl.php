<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Redirect;
use Session;
use Validator;



class authCtrl extends Controller
{
    public function login()
    {   
        if(Auth::check())
            return Redirect::back();
        else
            return view('frontEnd.auth.login');
    }

    public function signup()
    {
        if(Auth::check())
            return Redirect::back();
        else
        return view('frontEnd.auth.signup');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }



    public function doSignup(Request $request)
    {
        
        Validator::make($request->all(), [
            'fName' => 'required|max:10',
            'lName' => 'required',
        ],[
            'fName.max' => 'frist name must be less than 5 chars  '
        ])->validate();

        if(isset($errors) && count($errors) > 0){
            return Redirect::back();
        }else{
            try {
                $row = new User;
                $row->fName = $request->input('fName');
                $row->lName = $request->input('lName');
                $row->email = $request->input('email');
                $row->password = Hash::make($request->input('password'));
                $row->role = 0;
                $row->save();
    
                Session::flash('k',"User has been added");
            } catch (\Exception $e) {
                
                Session::flash('err',"Email exists");
            }
            return Redirect::back();
        }
    }


    public function doLogin(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');
        $remember   = $request->input('remember');

        $data       = ['email'=>$email , 'password'=>$password];

        if($remember == 1){
            if(Auth::attempt($data, true)){
                Session::flash('rm',"i remember u now :D");
            }else{
                Session::flash('rmx',"i  can't remember u now :D");
                return Redirect::back();
            }
        }else{
            if(Auth::attempt($data)){
                Session::flash('k',"i normal u now :D");
            }else{
                Session::flash('err',"i err u now :D");
                return Redirect::back();
                
            }
        }
        return Redirect::to("/");
    }






}
