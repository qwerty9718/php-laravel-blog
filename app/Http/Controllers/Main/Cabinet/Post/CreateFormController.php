<?php

namespace App\Http\Controllers\Main\Cabinet\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateFormController extends ServiceController
{
    public function createForm()
    {
        $categories = Category::all();
        $tags = Tag::all();
       return view('cabinet.post.create-form',compact('categories','tags'));
    }

    public function editForm($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('cabinet.post.create-form',compact('post','categories','tags'));
    }
}
