<?php

namespace App\Http\Controllers\Main\Cabinet\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FindOneController extends ServiceController
{
    public function __invoke($id)
    {
        $post = Post::findOrFail($id);
        $category = $post->category;
        $tags = $post->tags;
        return view('cabinet.post.find-one',compact('post','tags','category'));
    }
}
