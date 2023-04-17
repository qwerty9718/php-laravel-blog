<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topmenu;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
//        dd('index');
        $categories = Category::all();
//        $categories = Topmenu::menu();
        return view('admin.category.show-all',compact('categories'));
    }
}
