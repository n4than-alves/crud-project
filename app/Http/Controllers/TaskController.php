<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('tasks.index', [
            'tasks' => DB::table('tasks')->orderBy('id')->paginate('10')
        ]);
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
            'title' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('task.index')->with('succes','Tarefa criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        return view('tasks.edit', [
            'task' => Task::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->title,
            'is_completed' => $request->has('is_completed'), // true se o checkbox estiver marcado, false se não estiver
        ]);

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();    

        return redirect()->route('task.index')->with('success', 'Tarefa excluída com sucesso!');

    }
}
