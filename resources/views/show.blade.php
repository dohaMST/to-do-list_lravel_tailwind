@extends('layouts.app')

{{-- <h1>{{$task->title}}</h1> --}}
@section('title', $task->title )

@section('content')

    <div class="mb-4">
            <a class="link" href="{{route('tasks.index')}}">← Go back to the tasks list</a>
    </div>

    <p class="mb-4 text-slate-700">{{$task->description}}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif

    <p class="mb-4"> Created {{$task->created_at->diffForHumans()}} • Updated {{$task->updated_at->diffForHumans()}} </p>

    <div class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">task completed</span>
        @else
            <span class="font-medium text-red-500">task still not completed</span>
        @endif
    </div>

    {{-- THE BUTTONS --}}

    <div class="flex gap-2">
        <a  href="{{route("tasks.edit",['task'=> $task->id])}} " class="btn ">Edit Task</a>

        <form method="POST" action="{{route('tasks.toggle',['task'=> $task->id])}}">
            @csrf
            @method('PUT')
            <button class="btn">mark as {{$task->completed ? "not completed" : "completed"}}</button>
        </form>

        <form method="POST" action={{route("tasks.destroy",['task'=>$task->id])}}>
            @csrf
            @method('DELETE')

            <button class="btn">delete</button>
        </form>
    </div>
    {{-- <form  action={{route("tasks.edit",['task'=>$task->id])}}>
        @csrf

        <button>edit</button>
    </form> --}}

@endsection
