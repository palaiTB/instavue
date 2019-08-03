<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use DB;
use Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

  public function index($id)
  {
      $user = User::findOrFail($id);
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id): false;

      return view('home' , compact('user','follows'));
  }

  public function edit(User $user)
  {
      if(!Auth::guest() && auth()->user()->id == $user->id ){
        return view('profiles.edit',compact('user'));}
        else
        {
            return view('unauthorized');
        }

  }

  public function update(User $user)
  {

          $data = request()->validate([
              'title' => 'required',
              'description' => '',
              'url' => '',
              'image' => ''
          ]);

//     $user = new Profile();
//     $user->exists = true;
//     $user->user_id = auth()->user()->id;
//     $user->title = $data['title'];
//     $user->description = $data['description'];
//     $user->url = $data['url'];
        if(request('image')){
            $path= (request('image')->store('profile', 'public'));
            $image = Image::make(public_path("storage/{$path}"))->fit(250,250);
            $image->save();
        }
        else
        {
            $path = $user->profile->image;
        }

          DB::table('profiles')->where('user_id', (auth()->user()->id))->update(['title' => $data['title'], 'description' => $data['description'], 'url' => $data['url'], 'image' => $path ]);

     return redirect("/profile/{$user->id}");
  }

}
