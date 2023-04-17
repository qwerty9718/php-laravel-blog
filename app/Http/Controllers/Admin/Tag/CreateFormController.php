<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateFormController extends Controller
{
    public function createForm()
    {
       return view('admin.tag.create-form');
    }

    public function editForm($id){
        $tag = Tag::findOrFail($id);
        return view('admin.tag.create-form',compact('tag'));
    }
}
