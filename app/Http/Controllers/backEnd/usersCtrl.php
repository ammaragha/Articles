<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
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
}
