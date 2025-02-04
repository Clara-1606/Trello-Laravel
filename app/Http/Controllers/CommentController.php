<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controleur pour le CRUD Comment
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class CommentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        //
        $validateData= $request->validate([
            'text'=>'required|min:6|max:4000',
        ]);

        $comment= new Comment();
        $comment->text = $validateData["text"];
        $comment->task_id = $task->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return view ('user.tasks.show', compact('task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //$this->authorize('udpate', Comment::class);
        $validateData= $request->validate([
            'text'=>'required|min:6|max:4000',
        ]);

        $comment->text = $validateData["text"];
        $comment->update();
        $task=$comment->task;
        return redirect()->route('tasks.show', ['task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //$this->authorize('delete', Comment::class);
        $comment->delete();
        $task=$comment->task;
        return redirect()->route('tasks.show', ['task' => $task]);
    }
}
