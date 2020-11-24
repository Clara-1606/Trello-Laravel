<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On récupère tous les boards auquel il est participant
        $user = Auth::user();
        //On utilise la fonction boards dans le model User
        $user->boards;
        return view ('user.boards.index',['boards'=>$user->boards]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //renvoi le formulaire de création d'un board
        return view('user.boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData= $request->validate([
            'title'=>'required|min:6|max:255',
            'description'=>'required|min:6',
        ]);
        $board= new Board();
        $board->user_id = Auth::user()->id;
        $board->title = $validateData["title"];
        $board->description = $validateData["description"];
        $board->save();
        return redirect('/boards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board )
    {
        //
        return view("user.boards.show", ["board" => $board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
        return view ('user.boards.edit',['board'=>$board]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        //
        $validateData= $request->validate([
            'title'=>'required|min:6|max:255',
            'description'=>'required|min:6',
        ]);
        $board->title = $validateData['title'];
        $board->description = $validateData['description'];
        $board->update();
        return redirect('/boards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //
        $board->delete();
        return redirect('/boards');
    }
}
