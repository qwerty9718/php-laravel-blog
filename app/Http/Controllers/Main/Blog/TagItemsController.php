<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topmenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TagItemsController extends Controller
{
    public function __invoke($id)
    {

        $posts = Tag::findOrfail($id)->posts()->orderBy('id', 'DESC')->paginate(6);
        $lang = App::getLocale();
        return view('blog.category-items',compact('posts','lang'));

    }
}
