<?php

namespace App\Http\Controllers\Main\Cabinet\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends ServiceController
{
    public function __invoke($id)
    {

        $post = Post::findOrFail($id)->delete();
        return redirect()->route('cabinet.post.show-all');

    }
}
