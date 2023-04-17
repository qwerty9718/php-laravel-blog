<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {

        $data = request()->validate([
            'title'=>'required|string',
            'title_ru'=>'required|string',
            'parent_id'=>'nullable'
        ]);
        if ($data['parent_id']==''){
            unset($data['parent_id']);
        }

        Category::create($data);
        return redirect()->route('admin.category.show-all');

    }
}
