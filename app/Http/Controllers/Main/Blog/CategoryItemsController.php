<?php

namespace App\Http\Controllers\Main\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Topmenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryItemsController extends Controller
{
    public function __invoke($id)
    {
        $posts =  Post::where('category_id', '=', $id)->orderBy('id', 'DESC')->paginate(6);
        $lang = App::getLocale();
        return view('blog.category-items',compact('posts','lang'));

    }
}
