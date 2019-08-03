<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'title', 'image',
    ];

    public function details($id)
    {
      $user = DB::table('profiles')->where('user_id',$id)->get();
      return($user[0]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User:: class);
    }
}
