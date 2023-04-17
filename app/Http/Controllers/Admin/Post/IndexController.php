<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends ServiceController
{
    public function __invoke()
    {
//        dd('index');
        $posts = Post::all();
        return view('admin.post.show-all',compact('posts'));
    }
}
