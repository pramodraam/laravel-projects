@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p> {{ $task->long_description}}</p>
  @endif

  <p>{{ $task->created_at}}</p>
  <p>{{ $task->updated_at}}</p>

  <div>
    <a href="{{ route('task.edit', ['task' => $task]) }}">Edit</a>
  </div>

  <div>
    <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  </div>
@endsection