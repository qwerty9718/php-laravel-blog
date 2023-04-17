<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topmenu;
use Illuminate\Http\Request;

class CreateFormController extends Controller
{
    public function createForm()
    {
        $parent_ids = Category::all();
       return view('admin.category.create-form',compact('parent_ids'));
    }

    public function editForm($id){
        $parent_ids = Category::all();
        $category = Category::findOrFail($id);
        return view('admin.category.create-form',compact('category','parent_ids'));
    }
}
