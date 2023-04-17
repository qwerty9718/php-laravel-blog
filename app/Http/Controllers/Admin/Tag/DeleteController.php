<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {

            $tag = Tag::findOrFail($id);
            if ($tag->posts->count() > 0){
                $tag->posts()->detach();
                $tag->delete();
            }
            else{
                $tag->delete();
            }



        return redirect()->route('admin.tag.show-all');

    }
}
