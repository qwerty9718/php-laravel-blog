<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Menu;

class Topmenu extends Model
{
    protected $table = 'categories';
    protected $guarded = [];
//    protected $guwed = [];

    public static function menu(){
        Cache::remember('categories',5,function (){
            return self::all();
        });

        $menu = Cache::get('categories');

        $obj = Menu::make('Nav',function ($m) use ($menu){

            foreach ($menu as $item){

                if ($item->deleted_at == '' || $item->deleted_at == null){
                    if ($item->parent_id == 0){
                        $lang = App::getLocale();
                        if ($lang == 'ru'){$m->add($item->title_ru,$item->link)->id($item->id);}
                        elseif ($lang == 'en'){$m->add($item->title,$item->link)->id($item->id);}

                    }

                    else{
                        if ($m->find($item->parent_id)){
                            if ($lang == 'ru'){ $m->find($item->parent_id)->add($item->title_ru,$item->link)->id($item->id);}
                            elseif ($lang == 'en'){$m->find($item->parent_id)->add($item->title,$item->link)->id($item->id);}

                        }
                    }
                }


            }


        });

        return $obj;
    }
}
