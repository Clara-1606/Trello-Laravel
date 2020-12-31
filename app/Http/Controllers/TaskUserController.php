<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use App\Models\Task;
use App\Models\User;
use App\Models\Board;
use Illuminate\Http\Request;

/**
 * Controleur pour le CRUD Task User
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class TaskUserController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        
        $board = $task->board;
         // On récupère les ids des utilisateurs de la task : 
         $taskUsersIds = $board->users->pluck('id'); 
         // on récupère ici tous les utilisateurs qui ne sont pas dans la task. 
         // Notez le get, qui permet d'obtenir la collection (si on ne le met pas, on obtient un query builder mais la requête n'est pas executée)
         $usersNotIntask  = User::whereIn('id', $taskUsersIds)->get();
         return view('user.taskUser.create',['users'=>$usersNotIntask, 'task'=>$task]);
    }

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
            'user'=>'required|integer|exists:users,id',
        ]);
        $taskUser= new TaskUser();
        $taskUser->user_id = $validateData["user"];
        $taskUser->task_id = $task->id;
        $taskUser->save();
        return view ('user.tasks.show', compact('task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskUser  $taskUser
     * @return \Illuminate\Http\Response
     */
    public function show(TaskUser $taskUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskUser  $taskUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskUser $taskUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskUser  $taskUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskUser $taskUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskUser  $taskUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskUser $taskUser)
    {
        //
        $taskUser->delete();
        //relation model
        $task=$taskUser->task;
        return redirect()->route('tasks.show', ['task' => $task]);
    }
}
