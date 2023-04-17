<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Topmenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaveCommentController extends Controller
{
    public function __invoke()
    {

        $data = request()->validate([
            'content'=>'required|string',
            'user_id'=>'required|integer',
            'user_name'=> 'required|string',
            'post_id' => 'required|integer'
        ]);

        Comment::create($data);
        return redirect()->back();

    }
}
