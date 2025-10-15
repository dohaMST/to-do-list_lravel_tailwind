@extends('layouts.app')

{{-- <h1>{{$task->title}}</h1> --}}
@section('title', $task->title )

@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p> {{$task->created_at}} </p>
    <p> {{$task->updated_at}} </p>

    <div>
        @if ($task->completed)
            task completed
        @else
            task still not completed
        @endif
    </div>

    <div><a href="{{route('tasks.edit',['task'=> $task->id])}}">Edit Task</a></div>

    <form method="POST" action="{{route('tasks.toggle',['task'=> $task->id])}}">
        @csrf
        @method('PUT')
        <button>mark as {{$task->completed ? "not completed" : "completed"}}</button>
    </form>

    <form method="POST" action={{route("tasks.destroy",['task'=>$task->id])}}>
        @csrf
        @method('DELETE')

        <button>delete</button>
    </form>
    {{-- <form  action={{route("tasks.edit",['task'=>$task->id])}}>
        @csrf

        <button>edit</button>
    </form> --}}

@endsection
