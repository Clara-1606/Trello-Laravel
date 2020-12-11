<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardUser;
use App\Models\User;
use Illuminate\Http\Request;

class BoardUserController extends Controller
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
     *@param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board)
    {
        //
        // On récupère les ids des utilisateurs de la board : 
        $boardUsersIds = $board->users->pluck('id'); 
        // on récupère ici tous les utilisateurs qui ne sont pas dans la board. 
        // Notez le get, qui permet d'obtenir la collection (si on ne le met pas, on obtient un query builder mais la requête n'est pas executée)
        $usersNotInBoard  = User::whereNotIn('id', $boardUsersIds)->get();
        return view('user.boardUser.create',['users'=>$usersNotInBoard, 'board'=>$board]);
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
        //
        $validateData= $request->validate([
            'user'=>'required|integer|exists:users,id',
        ]);
        $boardUser= new BoardUser();
        $boardUser->user_id = $validateData["user"];
        $boardUser->board_id = $board->id;
        $boardUser->save();
        return view ('user.boards.show', compact('board'));
        //return redirect()->route('boards.show', $board);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function show(BoardUser $boardUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardUser $boardUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoardUser $boardUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardUser  $boardUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardUser $boardUser)
    {
        //
        $boardUser->delete();
        //relation model
        $board=$boardUser->board;
        return redirect()->route('boards.show', ['board' => $board]);
    }
}
