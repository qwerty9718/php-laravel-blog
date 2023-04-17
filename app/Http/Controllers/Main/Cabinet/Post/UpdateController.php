<?php

namespace App\Http\Controllers\Main\Cabinet\Post;



use App\Http\Requests\Cabinet\Post\UpdateRequest;

class UpdateController extends ServiceController
{
    public function __invoke($id,UpdateRequest $request)
    {

        $data = $request->validated();
        $this->service->update($data,$id);
        return redirect()->route('cabinet.post.show-all');

    }
}
