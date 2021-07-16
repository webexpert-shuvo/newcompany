<?php

namespace App\Http\Controllers;

use datatables;
use App\Models\ProCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use tidy;

class ProCategoryController extends Controller
{
    //Category Page Show

    public function Index()
    {

        if (Request()->ajax()) {
           return datatables()->of(ProCategory::latest()->get())->addColumn('action' , function($data){

                $output = '<a href="" class="btn btn-sm btn-info edit_cls" procat_id="'.$data -> id.'"><i class="fa fa-edit"></i></a>';
                $output .=  ' <a href="" class="btn btn-sm btn-danger delete_cls" procat_id="'.$data -> id.'"><i class="fa fa-trash"></i></a>';

                return $output;

           })->rawColumns(['action'])->make(true);
        }



        return view('backend.layouts.product.category.index');
    }


    //Product  add


    public function proCateAdd(Request $request)
    {

        $filename = '';
        if($request -> hasFile('photo')){
            $img = $request->file('photo');
            $filename = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img -> move(public_path('backend/assets/img/product/category') ,$filename );
        }

        ProCategory::create([

            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
            'photo'     => $filename,

        ]);



    }



}
