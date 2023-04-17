<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Post;
use Illuminate\Support\Facades\App;


class IndexController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'DESC')->paginate(6);
//        $slider = Post::get()->random(3);
        $slider = $posts->random()->take(3)->get();
        $likesPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(3);
        $lang = App::getLocale();
        return view('blog.index',compact('posts','slider','likesPosts','lang'));

    }



    public function about(){
        return view('blog.about');
    }

    public function contact(){
        return view('blog.contact');
    }

    public function sendMail(){

        $data = request()->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'message'=>'required|string',
        ]);

        SendEmailJob::dispatch($data);


        return redirect()->back();
    }
}
