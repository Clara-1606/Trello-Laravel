@extends('layouts.main')

@section('title', "La tâche {{$task->title}}")

@section ('content')

<h2>{{$task->title}}</h2>
<p>{{$task->description}}</p>
<p>Due Date : {{$task->due_date}}</p>
<p>State : {{$task->state}}</p>
<p> Catégorie : {{$task->categorie}}</p>
<br/>
<p>Créer le : {{$task->created_at}}</p>
<p> Modifié le : {{$task->updated_at}}</p>
<br/>
<br/>

<h3>Participants assignés à la tâche</h3>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Actions</td>
    </tr>
    @foreach($task->assignedUsers as $user)
    <tr>
     <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td> <form action="{{route('taskUser.destroy',$user->pivot)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button> 
    </form>
    </td>
    </tr>
    @endforeach

</table>
<a class="btn btn-primary" href="{{route('tasks.taskUser.create',$task->id)}}"> Ajouter un participant</a>

<br/><br/><br/>

<h3>Commentaires</h3>
<table class="table">
    <tr>
        <td>Nom</td>
        <td>Messages</td>
        <td>Heures</td>
        <td>Actions</td>
    </tr>
    @foreach($task->comments as $comment)
    <tr>
     <td>{{$comment->user->name}}</td>
    <td>{{$comment->text}}</td>
    <td>{{$comment->updated_at}}</td>
    @can('update',$comment)
    <td> <form action="{{route('tasks.comments.update', $comment)}}" method="POST">
        @csrf
        @method('PUT')
        <input value={{$comment->text}} type="text" id="text" name="text" class=@error('text')  is-invalid @enderror>
        @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-success" type="submit">Modifier</button>
    </form></td>
    @endcan
    @can('delete',$comment)
    <td> <form action="{{route('comments.destroy',$comment->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button> 
    </form>
    </td>
    @endcan
    </tr>
    @endforeach

</table>
<form action="{{route('tasks.comments.store', $task)}}" method="POST">
    @csrf
    <label for='text'> Commentaire </label>
    <input type="text" id="text" name="text" class=@error('text') is-invalid @enderror>
    @error('text')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button class="btn btn-primary" type="submit">Ajouter</button>
</form>

<br/><br/><br/>

<h3>Documents</h3>
<table class="table">
    <tr>
        <td>Nom</td>
        <td>Documents</td>
        <td>Heures</td>
        <td>Actions</td>
    </tr>
    @foreach($task->attachments as $attachment)
    <tr>
     <td>{{$attachment->user->name}}</td>
    <td>{{$attachment->text}}</td>
    <td>{{$attachment->updated_at}}</td>
    <td> <form action="{{route('attachments.destroy',$attachment->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button> 
    </form>
    </td>
    </tr>
    @endforeach

</table>
<form action="{{route('tasks.attachments.store', $task)}}" method="POST">
    @csrf
    <label for='file'> Documents </label>
    <input type="file" name="file" class=@error('file') is-invalid @enderror>
    @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button class="btn btn-primary" type="submit">Ajouter</button>
</form>

<br/>

<div class="row">
    <a class="btn btn-primary m-auto" href="{{route('boards.show',$task->board->id)}}"> Retour </a>
    </div>

@endsection