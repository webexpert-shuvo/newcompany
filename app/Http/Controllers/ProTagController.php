<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ProTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProTagController extends Controller
{
    //Show Product tag page
    public function Index()
    {

        if (request()->ajax()) {
            return datatables()->of(ProTag::latest()->get())->addColumn('action' , function($data){

                $btn = '<a class="btn btn-sm btn-info protag_edit" pro_tag_id="'.$data ->id.'"   href""><i class="fa fa-edit"></i></a> ';
                $btn .= ' <a class="btn btn-sm btn-danger protag_delete" pro_tagdelete_id="'.$data ->id.'"  href""><i class="fa fa-trash"></i></a>';

                return $btn;

            })->rawColumns(['action'])->make(true);
        }




        return view('backend.layouts.product.tag.index');


    }


    //tag Insert

    public function proTagStore(Request $request)
    {
        $tagData =    ProTag::create([

            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),

        ]);


        //Photo Upload
        $imagname = '';
        if($request -> hasFile('photo')){

            $img = $request -> file('photo');
            $imagname = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img ->move(public_path('backend/assets/img/product/tag'),$imagname);

            $tagData -> image() -> create([

                'imagename'     => $imagname,

            ]);


        }

    }

    //Taq Delete

    public function proTagDelete(Request $request , $id)
    {
        $pro_delete_id =   ProTag::find($id);
        $pro_delete_id -> delete();
        $pro_delete_id -> update();

    }


    public function proTagEdit(Request $request , $id)
    {
        $pro_edit_id =   ProTag::find($id);

        return [
            'name'      =>  $pro_edit_id -> name,
            'id'        =>  $pro_edit_id -> id,

        ];


    }


    //Prooduct Tag update

    public function proTagUpdate(Request $request , $id)
    {
        $update_id = ProTag::find($id);
        $update_id -> name = $request -> name;
        $update_id -> slug = Str::slug($request -> name);
        $update_id -> update();

    }



}
