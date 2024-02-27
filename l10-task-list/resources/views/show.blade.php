@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <div class="mb-4">
    <a href="{{ route('tasks.index') }}"
        class="link"><- Go Back to Task List</a>
  </div>

  <p class="mb-4 text-slate-700">{{ $task->description }}</p>

  @if ($task->long_description)
    <p class="mb-4 text-slate-700"> {{ $task->long_description}}</p>
  @endif

  <p class="mb-4 text-sm">Created {{ $task->created_at->diffForHumans() }} . Updated {{ $task->updated_at->diffForHumans() }}</p>

  <p>
    @if($task->completed)
      <span class="font-medium text-green-500">Task Completed.</span>
    @else
      <span class="font-medium text-red-500">Task Not completed.</span>
    @endif
  </p>

  <div class="flex gap-2">
    <a href="{{ route('task.edit', ['task' => $task]) }}"
      class="btn">Edit</a>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
      @csrf
      @method('PUT')
      <button class="btn" type="submit">
        Mark as {{ $task->completed ? 'not-completed' : 'completed'}}
      </button>
    </form>
    <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
      @csrf
      @method('DELETE')
      <button class="btn" type="submit">Delete</button>
    </form>
  </div>
@endsection