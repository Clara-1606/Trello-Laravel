@extends('layouts.main')

@section('title', "Les boards {{$board->title}}")

@section ('content')

<h2>{{$board->title}}</h2>
<p>{{$board->description}}</p>
<br/>
<br/>
<h3>Participants :</h3>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Actions</td>
    </tr>
    @foreach($board->users as $user)
    <tr>
     <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td> <form action="{{route('boardUser.destroy',$user->pivot)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button> 
    </form>
    </td>
    </tr>
    @endforeach

</table>
<a class="btn btn-primary" href="{{route('boards.boardUser.create',$board->id)}}"> Ajouter un participant</a>
<br/>
<br/>
<br/>

<h3>Tâches :</h3>

<table class="table">
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Description</td>
        <td>due_date</td>
        <td>Actions</td>
    </tr>
    @foreach($board->tasks as $task)
    <tr>
        <td>{{$task->id}}</td>
       <td>{{$task->title}}</td>
       <td>{{$task->description}}</td>
       <td>{{$task->due_date}}</td>
       <td>{{$task->id}}</td>
       <td> <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}"> Voir</a></td>
        <td> <a class="btn btn-success" href="{{route('tasks.edit',$task->id)}}"> Modifer</a></td>
       <td> <form action="{{route('tasks.destroy',$task->id)}}" method="post">
           @csrf
           @method('DELETE')
           <button class="btn btn-danger" type="submit"> Supprimer </button> 
       </td>
       </tr>
    </form>
       @endforeach
</table>
<a class="btn btn-primary" href="{{route('boards.tasks.create',$board->id)}}"> Ajouter une tâche</a>