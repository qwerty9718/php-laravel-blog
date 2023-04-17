<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {

        $data = request()->validate([
            'title'=>'required|string',
        ]);
        Tag::create($data);
        return redirect()->route('admin.tag.show-all');

    }
}
