<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //

    public function Index()
    {
        return view('backend.layouts.blog.category.index');
    }


    //Category Store
    public function categoryStore(Request $request)
    {

        Category::create([

            'user_id'       => Auth::user()-> id ,
            'name'          => $request -> name,
            'slug'          => Str::slug($request -> name),

        ]);


    }

    //Category all

    public function categoryAll()
    {


        $allCate =  Category::latest()->get();

        $content = '';
        $i = 1 ;
        foreach ($allCate as $cats) {

            //status
            if ($cats -> status == 'Active') {
                $status = '<span class="badge badge-success">Active</span>';
            }else{
                $status = '<span class="badge badge-danger">Inactive</span>';
            }

            //action

            if ($cats -> status == 'Active') {
                $status_btn = '<a class="btn btn-sm btn-dark status_btn" status_btn="'.$cats -> id.'"   href="" > <i class="fa fa-eye-slash"></i> </a>';
            }else{
                $status_btn = '<a class="btn btn-sm btn-success status_btn" status_btn="'.$cats -> id.'"   href="" > <i class="fa fa-eye"></i> </a>';
            }


            $content  .= '<tr>';
            $content  .= '<td>'.$i ; $i++.'</td>';
            $content  .= '<td>'.$cats -> name.'</td>';
            $content  .= '<td>'.$cats -> slug.'</td>';
            $content  .= '<td>'.$status.'</td>';
            $content  .= '<td>'.$status_btn.' <a class="btn btn-sm btn-info edit_btn" edit_btn="'.$cats -> id.'"  href=""> <i class="fa fa-edit"></i> </a>  <a class="btn btn-sm btn-danger delete_btn" delete_btn="'.$cats -> id.'"  href=""> <i class="fa fa-trash"></i> </a></td>';
            $content  .= '</tr>';

        }

        echo  $content;

    }


    //Category Status

    public function categoryStatus(Request $request , $id)
    {
        $status_update_id =    Category::find($id);

        if ($status_update_id -> status == 'Active') {
            $status_update_id -> status = 'Inactive';
            $status_update_id -> update();
        } else {
            $status_update_id -> status = 'Active';
            $status_update_id -> update();
        }

    }

    //Category Edit

    public function categoryEdit(Request $request , $id)
    {
        $edit_update_id = Category::find($id);

        return [
            'name'      =>  $edit_update_id -> name,

        ];
    }


    //Cate Update
    public function categoryUpdate(Request $request , $id)
    {
        $update_id = Category::find($id);
        $update_id -> name = $request -> name;
        $update_id -> slug  = Str::slug($request ->name);
        $update_id -> update();
    }

    //Category Delete

    public function categoryDelete(Request $request , $id)
    {
        $delete_id = Category::find($id);
        $delete_id -> delete();
        $delete_id -> update();
    }





}
