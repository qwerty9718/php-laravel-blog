<?php

namespace App\Http\Controllers\Main\Cabinet\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {

        $tags = DB::table('tags')->orderBy('id','DESC')->where('user_id','=',auth()->user()->id)->get();
        return view('cabinet.tag.show-all',compact('tags'));
    }
}
