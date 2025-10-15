@extends('layouts.app')

{{-- @section('title', "add task")

@section('styles')
    <style>
        .error_msg{
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')

<form method="POST" action="{{route('tasks.post')}}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" id="title" name="title" value={{old("title")}}>
    </div>

    @error('title')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <label for="description">
            Description
        </label>
        <textarea type="text" id="desc" name="description">{{old("description")}}</textarea>
    </div>
    @error('description')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea type="text" id="Ldesc" name="long_description" rows="10">{{old("long_description")}}</textarea>
    </div>
    @error('long_description')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <button type="submit">submit task</button>
    </div>
</form>

@endsection --}}
@section("content")
    @include("form")
@endsection
