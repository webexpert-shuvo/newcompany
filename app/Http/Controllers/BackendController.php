<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //Show login Page

    public function adminLogin()
    {
        return view('backend.login-page');
    }

    //Show login Page

    public function adminRegister()
    {
        return view('backend.register-page');
    }

    //Show login Page

    public function adminPanel()
    {
        return view('backend.admin-panel');
    }








}
