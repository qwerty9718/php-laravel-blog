<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class FindOneController extends Controller
{
    public function __invoke($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tag.find-one',compact('tag'));
    }
}
