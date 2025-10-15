@extends('layouts.app')

{{-- <h1>The List of Tasks</h1> --}}
@section('title', "The List of Tasks")
{{-- @isset($name)
    <h2>the name of etudiant is {{ $name }}</h2>
@endisset --}}

@section('content')
    <div>
        {{-- @if (count($tasks))
            @foreach ($tasks as $task)
                <div>title : {{$task -> title}}</div>
            @endforeach
        @else
            <div>there are no tasks</div>

        @endif --}}
        <div class="mb-4">
            <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{route('tasks.create')}}">Add New Task</a>
        </div>

        @forelse ($tasks as $task)
            <div>
                <a @class([ 'text-gray-500 line-through' => $task->completed]) href="{{route("tasks.show",['task'=> $task->id])}}">title : {{$task -> title}}</a>
            </div>
        @empty
            <div>there are no tasks</div>
        @endforelse
        @if ($tasks->count())
            <nav>
                {{$tasks->links()}}
            </nav>
        @endif
    </div>

@endsection
