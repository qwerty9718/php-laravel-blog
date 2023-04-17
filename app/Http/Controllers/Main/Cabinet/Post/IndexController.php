<?php

namespace App\Http\Controllers\Main\Cabinet\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends ServiceController
{
    public function __invoke()
    {
//        dd('index');
        $posts = auth()->user()->posts()->orderBy('id','DESC')->get();
        return view('cabinet.post.show-all',compact('posts'));
    }
}
