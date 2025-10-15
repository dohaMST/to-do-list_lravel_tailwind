@extends('layouts.app')

@section('title', isset($task)? "edit Task" : "add Task")

@section('styles')
    <style>
        .error_msg{
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')

<form method="POST" action="{{isset($task) ? route('tasks.update',['task' => $task->id]) : route('tasks.post')}}">
    @csrf
    {{-- @method('PUT') --}}
    @isset($task)
        @method('PUT')

    @endisset
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" id="title" name="title" value="{{$task->title ?? old('title')}}">
    </div>

    @error('title')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <label for="description">
            Description
        </label>
        <textarea type="text" id="desc" name="description" >{{$task->description ?? old("description")}}</textarea>
    </div>
    @error('description')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea type="text" id="Ldesc" name="long_description" rows="10" >{{$task->long_description ?? old("long_description")}}</textarea>
    </div>
    @error('long_description')
        <p class="error_msg"> {{$message}} </p>
    @enderror

    <div>
        <button type="submit">
            @isset($task)
                update task
            @else
                add task
            @endisset
        </button>
    </div>
</form>

@endsection
