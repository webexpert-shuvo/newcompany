<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    //User data

    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }

    //Category

    public function category()
    {
        return $this -> belongsToMany('App\Models\Category');
    }




    //Tag

    public function tag()
    {
        return $this -> belongsToMany('App\Models\Tag');
    }


    // get all comment
    public function comment()
    {
        return $this -> hasMany('App\Models\Comment');
    }





    //image Upload

    public function image()
    {
       return $this -> morphOne(Image::class, 'imageable');
    }


}
