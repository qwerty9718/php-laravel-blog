<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topmenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke($id)
    {

        $post = Post::findOrFail($id);
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();

    }
}
