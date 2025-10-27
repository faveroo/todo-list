<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->tasks()->create($request->only('title', 'description'));
        return redirect()->route('tasks.index')->with('success', 'Tarefa concluída com sucesso');
    }

    public function reopen(Request $request, $id) {
        $request->validate([
            'justification' => 'required|string|max:1000'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $task = $user->tasks()->findOrFail($id);

        $task->completed = false;
        $task->save();

        $task->reopenJustification()->create([
            'user_id' => Auth::id(),
            'justification' => $request->justification,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa reaberta!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $task = Task::findOrFail($id);
        $task->update($request->only('title', 'description', 'completed'));
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída!');
    }
}
