<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        return view('posts.index',compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' =>'required|image'
        ]);

//        dd(request('image')->store('uploads', 'public'));

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->caption = $data['caption'];
        $path= (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$path}"))->fit(350,320);
        $image->save();
        $post->image = $path;
        $post->save();

         return redirect('/profile/'.(auth()->user()->id));
    }

    public function show(Post $post)  //when the respective controller is taken into consideration laravel does the job automatically
    {
        return view('posts.show', compact('post'));
    }

}
