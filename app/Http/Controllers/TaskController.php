<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Controleur pour le CRUD Task
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *  @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board)
    {
        //
        $categories= Category::all();
        return view('user.tasks.create',['categories'=>$categories, 'board'=>$board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board)
    {
        $validateData= $request->validate([
            'title'=>'required|min:6|max:255',
            'description'=>'required|min:6',
            'due_date' => 'required|date|after_or_equal:tomorrow',
            'category'=>'required|exists:categories,id',
            'state'=>'required|in:todo,ongoing,done',
        ]);

        $task= new Task();
        $task->title = $validateData["title"];
        $task->description = $validateData["description"];
        $task->due_date = $validateData["due_date"];
        $task->state = $validateData["state"];
        $task->board_id = $board->id;
        $task->save();
        //On peut tout faire en une ligne
        //Task::create($validateData)
        return view ('user.boards.show', compact('board'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('user.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $categories= Category::all();
        return view('user.tasks.edit',['categories'=>$categories, 'task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $validateData= $request->validate([
            'title'=>'required|min:6|max:255',
            'description'=>'required|min:6',
            'due_date' => 'required',
            'category'=>'required',
            'state'=>'required|in:todo,ongoing,done',
        ]);

        $task->title = $validateData["title"];
        $task->description = $validateData["description"];
        $task->due_date = $validateData["due_date"];
        $task->state = $validateData["state"];
        $task->update();

        $board=$task->board;
        return redirect()->route('boards.show', ['board' => $board]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        //relation model
        $board=$task->board;
        return redirect()->route('boards.show', ['board' => $board]);
    }
}
