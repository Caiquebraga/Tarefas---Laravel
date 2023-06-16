<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('newtarefa');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'description' => 'required',
        'due_date' => 'required|date|after:today',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    Task::create($request->all());
    return redirect('/tasks');
}
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect('/tasks/' . $task->id);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}

