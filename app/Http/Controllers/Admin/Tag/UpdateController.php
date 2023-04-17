<?php

namespace App\Http\Controllers\Admin\Tag;

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
        return redirect()->route('admin.tag.show-all');

    }
}
