@extends('todo.template')

@section('title')
    @if($todo->id)
        Edit Task
    @else
        New Task
    @endif
@endsection

@section('header')
    @if($todo->id)
        Edit Task
    @else
        New Task
    @endif
@endsection

@section('content')
    <form action="{{ ($todo->id)? route('todos.update', ['todo' => $todo]) : route('todos.store') }}" class="row" method="post">
        @csrf
        @if($todo->id)
            @method('put')
        @endif
        <div class="form-group col-12">
            <label for="task">Task:</label>
            <input type="text" class="form-control" id="task" placeholder="typing practice" required name="task"
                   value="{{ old('task') ?? $todo->task }}">
        </div>
        <div class="form-group col-12">
            <label for="schedule">Date:</label>
            <input type="date" class="form-control" id="schedule" required name="date"
                   value="{{ old('date') ?? substr($todo->schedule, 0, 10) }}">
        </div>
        <div class="form-group col-12">
            <label for="schedule">Time:</label>
            <input type="time" class="form-control" id="schedule" required name="time"
                   value="{{ old('time') ?? substr($todo->schedule, 11, 8) }}">
        </div>
        <div class="form-group col-12">
            <label for="status">Status:</label>
            <select class="form-control" id="status" required name="status">
                <option value="pending" selected>pending</option>
                <option value="completed">completed</option>
                <option value="cancelled">cancelled</option>
            </select>
        </div>
        <div class="form-group col-12 text-right">
            <button class="btn btn-secondary">
                @if($todo->id)
                    save
                @else
                    add
                @endif
            </button>
        </div>
    </form>
@endsection
