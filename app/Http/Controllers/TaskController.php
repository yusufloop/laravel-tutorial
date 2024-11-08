<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        #call the orm with user() method on model Task
        $tasks = Task::with('user')->get();
        // dd($users);
        return view('tasks.index', compact('tasks' ));
    }

    public function store(Request $request)
    {
 
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'duedate' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);
        // Task::create($request->all());  #for all request
        $task = Task::create([
           'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'duedate' => $request->duedate,
            'user_id' => $request->user_id 
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task Created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'duedate' => 'required',

        ]);
        $task = Task::find($id);
        // $task->update($request->all()); #for all
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'duedate' => $request->duedate,
            'user_id' => $request->user_id 
        ]);
        return redirect()->route('tasks.index')->with('success', 'Taks updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Deleted successfully');
    }

    public function create()
    {
        $users = User::all();
    
        return view('tasks.create', compact('users'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function toggleCompletion($id)
    {
        $task = Task::find($id);

        if ($task){
            $task->completed = !$task->completed;
            $task->save();
        }

        return redirect()->route('tasks.index')->with('success', 'Task status updated.');
    }
}
