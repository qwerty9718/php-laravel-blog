<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke($id)
    {

        $data = request()->validate([
            'title'=>'required|string',
            'title_ru'=>'required|string',
            'parent_id'=>'nullable'
        ]);
        if ($data['parent_id']==''){
            $data['parent_id'] = null;
        }
        $category = Category::findOrFail($id)->update($data);
        return redirect()->route('admin.category.show-all');

    }
}
