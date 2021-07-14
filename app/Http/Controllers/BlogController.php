<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //show Blog Page

    public function Index()
    {

        $allblogdata =  Post::where('status' , 'Active')->latest()-> paginate(1);

       return view('company.blog' , [

            'posts'     => $allblogdata,

       ]);
    }


    //Show Single Post

    public function singlePost(Request $request , $slug)
    {
        $single_data =    Post::where('slug' , $slug) -> first();
        return view('company.blog-single' , [

            'postdata'   => $single_data,

        ]);
    }

    //Post Search


    public function postSearch(Request $request)
    {
        $searchdata = $request -> search;

        $datasearch = Post::where('name' , 'LIKE' , '%'.$searchdata.'%')-> oRwhere('content','LIKE','%'.$searchdata. '% ')->latest()->paginate();

        return view('company.blog-search' , [

            'posts'     => $datasearch,

        ]);


    }




}
