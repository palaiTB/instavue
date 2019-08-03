@extends('layouts.app')

@section('content')

    <div class="container p-5">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </div>
            <div class="col-4">

                <div class="d-flex ">
                    <div class=""><h2 class="pr-5"><strong>{{$post->user->username}}</strong></h2></div>
                    <div class=""><a class=" btn btn-outline-danger" href="">Follow</a></div>
                </div>
                <div class="pt-5"><p>{{$post->caption}}</p></div>
            </div>
        </div>
    </div>

@endsection
