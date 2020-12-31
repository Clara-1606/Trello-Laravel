@extends('layouts.main')

@section('title', 'Create a board')

@section ('content')
<form method="POST" action="/boards">
    @csrf
    <div class="form-group">
    <label for='title'> Title board</label>
    <input type="text" id="title" name="title" class=@error('title') is-invalid @enderror>
    </div>
    <label for='description'> Description board</label>
    <input type="textarea" id="description" name="description" class=@error('description') is-invalid @enderror>

    @error('description')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror 
    @error('title')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror
    <button type="submit"> Sauvegarder </button>

</form>

<div class="row">
    <a class="btn btn-primary m-auto" href="{{route('boards.index')}}"> Retour </a>
    </div>
@endsection