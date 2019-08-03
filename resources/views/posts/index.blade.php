@extends('layouts.app')

@section('content')

    <div class="container ">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{$post->user->id}}">
                        <img src="/storage/{{$post->image}}" alt="" class="w-100">
                    </a>
                </div>
            </div>
{{--            <div class="row">
                <div class="col-4">
                    <div class="d-flex ">
                        <div class=""><h2 class="pr-5"><a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></h2></div>
                    </div>
                    <div class="pt-5"><p>{{$post->caption}}</p></div>
                </div>
            </div>--}}
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <div class="">
                        <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{$post->user->id}}">
                                    <span>
                                        <span class="text-dark">{{$post->user->username}}</span>
                                    </span>
                                </a>

                            </span>: {{$post->caption}}
                        </p>
                    </div>
                </div>

            </div>
        @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>

@endsection
