@extends('layouts.main')

@section('title', 'Add Participants')

@section ('content')
<form method="POST" action={{route('tasks.taskUser.store',$task->id)}}>
    @csrf
    <div class="form-group">
    <label for='mail'> E-mail utilisateur</label>
    <select name='user' id='user'>
        @foreach ($users as $user) { ?>
            <option value={{$user->id}}> {{$user->email}}</option>
        @endforeach
    </select>
    </div>

    @error('mail')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror
    <button type="submit"> Sauvegarder </button>

</form>

<div class="row">
    <a class="btn btn-primary m-auto" href="{{route('tasks.show',$task->id)}}"> Retour </a>
    </div>
@endsection