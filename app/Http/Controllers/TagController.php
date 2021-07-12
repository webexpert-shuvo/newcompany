<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    //

    public function Index()
    {
        return view('backend.layouts.blog.tag.index');
    }


    //Category Store
    public function TagStore(Request $request)
    {

        Tag::create([

            'user_id'       => Auth::user()-> id ,
            'name'          => $request -> name,
            'slug'          => Str::slug($request -> name),

        ]);


    }

    //Category all

    public function TagAll()
    {


        $allTag =  Tag::latest()->get();

        $content = '';
        $i = 1 ;
        foreach ($allTag as $tag) {

            //status
            if ($tag -> status == 'Active') {
                $status = '<span class="badge badge-success">Active</span>';
            }else{
                $status = '<span class="badge badge-danger">Inactive</span>';
            }

            //action

            if ($tag -> status == 'Active') {
                $status_btn = '<a class="btn btn-sm btn-dark status_btn" status_btn="'.$tag -> id.'"   href="" > <i class="fa fa-eye-slash"></i> </a>';
            }else{
                $status_btn = '<a class="btn btn-sm btn-success status_btn" status_btn="'.$tag -> id.'"   href="" > <i class="fa fa-eye"></i> </a>';
            }


            $content  .= '<tr>';
            $content  .= '<td>'.$i ; $i++.'</td>';
            $content  .= '<td>'.$tag -> name.'</td>';
            $content  .= '<td>'.$tag -> slug.'</td>';
            $content  .= '<td>'.$status.'</td>';
            $content  .= '<td>'.$status_btn.' <a class="btn btn-sm btn-info edit_btn" edit_btn="'.$tag -> id.'"  href=""> <i class="fa fa-edit"></i> </a>  <a class="btn btn-sm btn-danger delete_btn" delete_btn="'.$tag -> id.'"  href=""> <i class="fa fa-trash"></i> </a></td>';
            $content  .= '</tr>';

        }

        echo  $content;

    }


    //Category Status

    public function TagStatus(Request $request , $id)
    {
        $status_update_id =    Tag::find($id);

        if ($status_update_id -> status == 'Active') {
            $status_update_id -> status = 'Inactive';
            $status_update_id -> update();
        } else {
            $status_update_id -> status = 'Active';
            $status_update_id -> update();
        }

    }

    //Category Edit

    public function tagEdit(Request $request , $id)
    {
        $edit_update_id = Tag::find($id);

        return [
            'name'      =>  $edit_update_id -> name,

        ];
    }


    //Cate Update
    public function TagUpdate(Request $request , $id)
    {
        $update_id = Tag::find($id);
        $update_id -> name = $request -> name;
        $update_id -> slug  = Str::slug($request ->name);
        $update_id -> update();
    }

    //Category Delete

    public function TagDelete(Request $request , $id)
    {
        $delete_id = Tag::find($id);
        $delete_id -> delete();
        $delete_id -> update();
    }





}
