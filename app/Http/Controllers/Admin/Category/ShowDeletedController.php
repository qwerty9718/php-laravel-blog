<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topmenu;
use Illuminate\Http\Request;

class ShowDeletedController extends Controller
{
    public function showDeleted()
    {


        $categories = Category::onlyTrashed()->get();
//        $category->restore();
        return view('admin.category.show-deleted', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return redirect()->route('deleted');
    }
}
