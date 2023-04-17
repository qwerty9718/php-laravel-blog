<?php

namespace App\Http\Controllers\Main\Cabinet\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateFormController extends Controller
{
    public function createForm()
    {
       return view('cabinet.tag.create-form');
    }

    public function editForm($id){
        $tag = Tag::findOrFail($id);
        return view('cabinet.tag.create-form',compact('tag'));
    }
}
