<?php

namespace App\Http\Controllers\Main\Cabinet\Post;






use App\Http\Requests\Cabinet\Post\StoreRequest;

class StoreController extends ServiceController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('cabinet.post.show-all');

    }
}
