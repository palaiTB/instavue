@extends('layouts.app')
<?php
use App\Profile;
use App\Post;
 ?>
@section('content')
<div class="container" style="margin: auto">
  <div class="row">
    <div class="col-3 p-5">
      <img class="rounded-circle" src="/storage/{{$user->profile->image}}" alt="">
    </div>


    <?php
       if(!Auth::guest())
           {
               $Authid = Auth::user()->id;
               $obj = new Profile();
               $obj2 = new Post();

               $getid = $user->id;
               $posts = $obj2->posts($getid); //for experimental purposes. Plane sql query retreival
                //      echo '<pre>';
                //      print_r($posts);
                //      exit();
           $details = $obj->details($getid);
           }

     ?>


    <div class="col-9 p-5">
      <div class="d-flex">
        <h1>{{$user->name}}</h1>


          @if($user->id !== auth()->user()->id)
              <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>    <!--  Vue Component -->
          @endif

          @if(!Auth::guest()  && (Auth::user()->id == $user->profile->user_id) )
              <div ><a class="btn" href="/p/create"><img src="https://img.icons8.com/material/24/000000/add.png"></a></div>
          @endif
      </div>
        @if(!Auth::guest()  && (Auth::user()->id == $user->profile->user_id) )
            <div><a href="/profile/{{$user->id}}/edit">Edit Profile</a> </div>
        @endif
        <div class="d-flex">
          <div class="pr-4">
            <strong>{{$user->posts->count()}}</strong> posts                                <!-- You can also write it as $user->posts->count();-->
          </div>
          <div class="pr-4">
            <strong>{{$user->profile->followers->count()}}</strong> followers
          </div>
          <div class="pr-4">
            <strong>{{$user->following->count()}}</strong> following
          </div>
        </div>
        <div class="pt-4">
          <strong>{{$user->profile->title}}</strong><br>
          {{$user->profile->description}}
        </div>
        </div>
      </div>

      <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}"><img class="img-thumbnail" src="/storage/{{$post->image}}" alt=""></a>
                </div>
             @endforeach
      </div>



</div>
@endsection
