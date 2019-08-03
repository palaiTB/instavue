@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class=" col-form-label ">Caption <br></label>
                    <br>

                        <input id="" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('name') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>
                <div class="row">
                    <label for="caption" class=" col-form-label ">Image <br></label>
                    <input type="file" class="form-control-file" name="image" id="image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>

                    @enderror
                </div>

                <div class="row pt-3">
{{--                    <a href="" class="btn btn-dark">Submit</a>--}}
{{--                    A form HAS TO contain a button--}}
                    <button class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </form>

</div>

@endsection
