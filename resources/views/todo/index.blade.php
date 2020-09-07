@extends('todo.template')

@section('title')
    Todos
@endsection

@section('header')
    <div class="d-flex justify-content-between">
        <span>Todo List</span> <a href="{{ route('todos.create') }}" class="btn btn-primary">add new</a>
    </div>
@endsection

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Schedule</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->task }}</td>
                <td>{{ \Carbon\Carbon::parse($todo->schedule)->format('l d M @ H:i') }}</td>
                <td>{{ $todo->status }}</td>
                <td>
                    <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}">edit</a>
                    <form action="{{ route('todos.destroy', ['todo' => $todo]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
