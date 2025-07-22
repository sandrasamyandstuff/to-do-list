<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         session(['from_index' => true]);
        $tasks = Tasks::where('user_id', Auth::id())->get();
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
        Tasks::create([
            'value' => $data['value'],
            'user_id' => Auth::id()
        ]);
        return redirect()->route('index')->with('success', 'created successfully');
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


    if (session('from_index')) {
            return redirect()->route('index')->with('success', 'updated successfully');
        } else if ($task->completed_at) {
            return redirect()->route('showcomp')->with('success', 'updated successfully');
        } else {
            return redirect()->route('showincomp')->with('success', 'updated successfully');
        }
    }


    public function destroy(Tasks $task)
    {
        $task->delete();

        return redirect()->back()->with('success', 'deleted successfully');
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
         session(['from_index' => false]);
        $tasks = Tasks::where('user_id', Auth::id())
              ->whereNotNull('completed_at')
              ->get();
        return view('tasks.completed', compact('tasks'));
    }

    public function showincomplete()
    {
        session(['from_index' => false]);
        $tasks = Tasks::where('user_id', Auth::id())
              ->whereNull('completed_at')
              ->get();
        return view('tasks.incompleted', compact('tasks'));
    }
}
