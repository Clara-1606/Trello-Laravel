@extends('layouts.main')

@section('title', 'Create a board')

@section ('content')
<form method="POST" action={{route('boards.update',$board->id)}}>
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for='title'> Title board</label>
    <input type="text" id="title" name="title" value={{$board->title}} class=@error('title') is-invalid @enderror>
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
@endsection