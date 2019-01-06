<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $done_tasks = Task::where('status', 'done')
          ->get();

        $doing_tasks = Task::where('status', 'doing')
          ->get();

        return view('tasks.index')
          ->with('done_tasks', $done_tasks)
          ->with('doing_tasks', $doing_tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'task' => 'required|min:5|max:192',
        ]);

        if ($validator->fails()) {
          return redirect('tasks/create')
            ->withErrors($validator)
            ->withInput();
        }

        $task = new Task();
        $task->task = $request->task;
        $task->status = 'doing';

        $task->save();

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')
          ->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $validator = Validator::make($request->all(), [
          'task' => 'required|min:5|max:192',
        ]);

        if ($validator->fails()) {
          return redirect('tasks/' . $task->id . '/edit')
            ->withErrors($validator)
            ->withInput();
        }
        $task->task = $request->task;
        $task->status = 'doing';

        $task->save();

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('tasks');
    }

    public function switch($id)
    {
      $task = Task::find($id);
      if ($task->status == 'doing') {
        $task->status = 'done';
      } else {
        $task->status = 'doing';
      }

      $task->save();

      return redirect('tasks');
    }
}
