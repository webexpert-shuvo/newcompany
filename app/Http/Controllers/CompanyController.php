<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //Show Home Page

    public function Index()
    {
       return view('company.home');
    }




}
