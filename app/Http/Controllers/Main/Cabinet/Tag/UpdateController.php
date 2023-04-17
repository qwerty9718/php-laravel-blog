<?php

namespace App\Http\Controllers\Main\Cabinet\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke($id)
    {

        $data = request()->validate([
            'title'=>'required|string',
        ]);
        $tag = Tag::findOrFail($id)->update($data);
        return redirect()->route('cabinet.tag.show-all');

    }
}
