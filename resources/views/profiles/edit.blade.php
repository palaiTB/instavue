@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method("PATCH")

            <div class="row">
                <div class="col-8 offset-2">
                    <h1 class="text-center">Edit Profile</h1>
                    <div class="form-group row">
                        <label for="title" class=" col-form-label ">Title <br></label>
                        <br>

                        <input id="" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  $user->profile->title }}" required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="description" class=" col-form-label ">Description <br></label>
                        <br>

                        <input id="" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description}}" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>


                    <div class="form-group row">
                        <label for="url" class=" col-form-label ">URL <br></label>
                        <br>

                        <input id="" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{  $user->profile->url}}">

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>


                    <div class="row">
                        <label for="image" class=" col-form-label ">Profile Image <br></label>
                        <input type="file" class="form-control-file" name="image" id="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>

                        @enderror
                    </div>

                    <div class="row pt-3 ">
                        {{--                    <a href="" class="btn btn-dark">Submit</a>--}}
                        {{--                    A form HAS TO contain a button--}}
                        <button class="btn btn-primary">Save Profile</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
