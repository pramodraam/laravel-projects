@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
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
@endsection
