<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topmenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SingleController extends Controller
{
    public function __invoke($id)
    {

        $post = Post::findOrFail($id);
        $time = Carbon::parse($post->created_at);
        $comments = $post->comments;
        $lang = App::getLocale();
        return view('blog.single',compact('post','time','comments','lang'));

    }
}
