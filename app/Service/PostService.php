<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data){
        try {
            DB::beginTransaction();

            if (isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }

            if (isset($data['image'])){
                $data['image'] = Storage::put('/public/images',$data['image']);
            }
            if (isset($data['second_image'])){
                $data['second_image'] = Storage::put('/public/images',$data['second_image']);
            }

            $post =  Post::create($data);

            if (isset($tags)){
                $post->tags()->attach($tags);
            }

            DB::commit();
        }catch (\Exception $exception){

            DB::rollBack();
            abort(500);

        }
    }



    public function update($data,$id){
        try {
            DB::beginTransaction();

            $post = Post::findOrFail($id);

            if (isset($data['image'])){
                $data['image'] = Storage::put('/public/images',$data['image']);
            }
            if (isset($data['second_image'])){
                $data['second_image'] = Storage::put('/public/images',$data['second_image']);
            }
            $tags = null;

            if (isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }


            $post->update($data);
            $post->tags()->sync($tags);

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);

        }
    }

}
