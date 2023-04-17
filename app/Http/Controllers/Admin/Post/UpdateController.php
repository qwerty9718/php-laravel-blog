<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends ServiceController
{
    public function __invoke($id,UpdateRequest $request)
    {

        $data = $request->validated();
        $this->service->update($data,$id);
        return redirect()->route('admin.post.show-all');

    }
}
