<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FindOneController extends Controller
{
    public function __invoke($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.find-one',compact('category'));
    }
}
