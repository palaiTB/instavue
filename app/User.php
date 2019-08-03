<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
      return $this->hasOne(Profile::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        //Used to create default profile of registered user.
        static::created(function($user){
           $user->profile()->create([
               'user_id' => $user->id,
               'title' => $user->username,
               'image' => 'profile/new_user.jpg'
           ]);

           Mail:: to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBY('created_at', 'DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
}
