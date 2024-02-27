@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div>
        <a href="{{ route('task.create') }}">Add New Task</a>
    </div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    {{-- @else --}}
    @empty
        <div>There are no tasks</div>
    @endforelse
    {{-- @endif --}}

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection