<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function likedPosts(){
        return $this->belongsToMany(Post::class,'post_user_likes','user_id','post_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_id','id');
    }

//    public function comments(){
//        return  DB::table('comments')->where('user_id','=',$this->id)->orderBy('id','DESC')->get();
//    }

    public function comments(){
        return  Comment::where('user_id','=',$this->id)->orderBy('id','DESC')->get();
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function getRole(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
