<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {

        $category = Category::findOrFail($id)->delete();
//        $category = Category::withTrashed()->find($id);
//        $category->restore();
        return redirect()->route('admin.category.show-all');

    }
}
