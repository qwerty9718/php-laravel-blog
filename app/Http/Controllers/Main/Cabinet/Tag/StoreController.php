<?php

namespace App\Http\Controllers\Main\Cabinet\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {

        $data = request()->validate([
            'title'=>'required|string',
            'user_id'=>'required|integer'
        ]);
        Tag::create($data);
        return redirect()->route('cabinet.tag.show-all');

    }
}
