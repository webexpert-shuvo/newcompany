<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //Show Post Page

    public function Index()
    {
        return view('backend.layouts.blog.post.index');
    }


    //Post Add Page

    public function postAdd()
    {
        $allcates   = Category::where('status' , 'Active')->latest()->get();
        $alltags    = Tag::where('status' , 'Active')->latest()->get();
        return view('backend.layouts.blog.post.post-create' , [

                'cates'     => $allcates,
                'tags'     => $alltags,

        ]);
    }

    //Post Store

    public function postStore(Request $request)
    {
        $postdata = Post::create([

            'user_id'   => Auth::user()->id,
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
            'content'   => $request -> content,

        ]);

        $fileuname = '';
        if ($request -> hasFile('photo')) {
            $fileget = $request -> file('photo');
            $fileuname = md5(time().rand()).'.'.$fileget -> getClientOriginalExtension();
            $fileget -> move(public_path('backend/assets/img/post') ,$fileuname  )  ;

            $postdata -> image()-> create([

                'imagename'     => $fileuname,

            ]);
        }

        $postdata -> category() -> attach($request -> cats);
        $postdata -> tag()->attach($request->tags);
        return redirect()->back()->with('success' , 'Post Insert Done');

    }


}
