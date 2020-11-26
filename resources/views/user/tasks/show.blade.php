@extends('layouts.main')

@section('title', "La tâche {{$task->title}}")

@section ('content')

<h2>{{$task->title}}</h2>
<p>{{$task->description}}</p>
<p>Due Date : {{$task->due_date}}</p>
<p>State : {{$task->state}}</p>
<br/>
<p>Créer le : {{$task->created_at}}</p>
<p> Modifié le : {{$task->updated_at}}</p>
<br/>
