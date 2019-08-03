<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts($id)
    {
        $post = DB::table('posts')->where('user_id', $id)->orderBY('created_at', 'DESC')->get();
        return ($post);
    }
}
