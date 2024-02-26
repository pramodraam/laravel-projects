@extends('layouts.app')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('title', 'Add Tasks')

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
@csrf
    <div>
        <label for="title">Title</label>
        <input text="text" name="title" id="title">
    </div>
    @error('title')
    <p class="error-message"> {{ $message }} </p>
    @enderror
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5"></textarea>
    </div>
    @error('description')
    <p class="error-message"> {{ $message }} </p>
    @enderror

    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>
    @error('long_description')
    <p class="error-message"> {{ $message }} </p>
    @enderror

    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection
