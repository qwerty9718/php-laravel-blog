<?php

namespace App\Http\Controllers\Main\Cabinet\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class FindOneController extends Controller
{
    public function __invoke($id)
    {
        $tag = Tag::findOrFail($id);
        return view('cabinet.tag.find-one',compact('tag'));
    }
}
