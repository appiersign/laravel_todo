<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('todo.index', ['todos' => Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('todo.createOrEdit', ['todo' => new Todo()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => ['required', 'string', 'min:4'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:pending,completed,cancelled']
        ]);

        $data = $request->only('task', 'status');
        $data['schedule'] = implode(' ', $request->only('date', 'time'));

        Todo::query()->create($data);
        session()->flash('success', 'Task Added!');

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return Response
     */
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.createOrEdit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Todo  $todo
     * @return RedirectResponse
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $request->validate([
            'task' => ['required', 'string', 'min:4'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:pending,completed,cancelled']
        ]);

        $data = $request->only('task', 'status');
        $data['schedule'] = implode(' ', $request->only('date', 'time'));

        $todo->update($data);
        session()->flash('success', 'Task Updated!');

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return RedirectResponse
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();
        session()->flash('success', "$todo->task deleted!");
        return redirect()->route('todos.index');
    }
}
