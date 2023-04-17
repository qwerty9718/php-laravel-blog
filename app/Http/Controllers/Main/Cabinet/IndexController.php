<?php

namespace App\Http\Controllers\Main\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->posts()->orderBy('id','DESC')->get();
        $likes = 0;
        foreach ($posts as $post){
            $likes += $post->likedUsers->count();
        }

        $comments = auth()->user()->comments();

        return view('cabinet.index',compact('likes','posts','comments'));
    }
}
