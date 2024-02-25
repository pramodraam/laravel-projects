<h1> The list of tasks</h1>

<div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    {{-- @else --}}
    @empty
        <div>There are no tasks</div>
    @endforelse
    {{-- @endif --}}
</div>
