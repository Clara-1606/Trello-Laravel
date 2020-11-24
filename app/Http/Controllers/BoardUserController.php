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
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board)
    {
        //
        $users = User::all();
        return view('user.boardUser.create',['users'=>$users, 'board'=>$board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board)
    {
        //
        $validateData= $request->validate([
            'user'=>'required',
        ]);
        $boardUser= new BoardUser();
        $boardUser->user_id = $validateData["user"];
        $boardUser->board_id = $board->id;
        $boardUser->save();
        return view ('user.boards.show', compact('board'));
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
