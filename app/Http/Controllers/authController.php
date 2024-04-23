<?php
// authController.php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class authController extends Controller
{

    public function checkUserType(){

        if(Auth::id()){

            $userType = Auth()->user()->userType;

            if($userType == "user"){
                return view('dashboard');
            }

            else if($userType == "admin"){
                return view('Admin.adminHome');
            }
            else{
                return redirect()->back();
            }

        }
    
    }
}
