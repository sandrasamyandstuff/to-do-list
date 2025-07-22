<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Carbon\Carbon;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Tasks::all();
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
    public function store(StoreTasksRequest $request)
    {
        $data = $request->validated();
        Tasks::create($data);
        return redirect()->route('index')->with('success', 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $task)
    {

        $data = $request->validated();

        $task->update([
            'value' => $data['value']
        ]);

        return redirect()->route('index')->with('success', 'updated');
    }


    public function destroy(Tasks $task)
    {
        $task->delete();

        return redirect()->route('index')->with('success', 'deleted');
    }



    public function complete(Tasks $task)
    {
        $task->completed_at = Carbon::now();
        $task->save();
        return redirect()->back()->with('success', 'Task completed!');
    }

    public function incomplete(Tasks $task)
    {
        $task->completed_at = null;
        $task->save();
        return redirect()->back()->with('success', 'Task unmarked');
    }

       public function showcomplete()
    {
       $tasks = Tasks::whereNotNull('completed_at')->get();
         return view('tasks.completed', compact('tasks'));


    }

    public function showincomplete()
    {
        $tasks=Tasks::where('completed_at',null)->get();
         return view('tasks.incompleted', compact('tasks'));
    }
}
