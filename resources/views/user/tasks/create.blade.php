@extends('layouts.main')

@section('title', 'Add Tasks')

@section ('content')
<form method="POST" action={{route('boards.tasks.store',$board->id)}}>
    @csrf
    <div class="form-group">
        <label for='title'> Title</label>
    <input type="text" id="title" name="title" class=@error('title') is-invalid @enderror>
    </div>
    <div class="form-group">
    <label for='description'> Description</label>
    <input type="textarea" id="description" name="description" class=@error('description') is-invalid @enderror>
    </div>
    <div class="form-group">
    <label for='due_date'> due_date</label>
    <input type="date" id="due_date" name="due_date" class=@error('due_date') is-invalid @enderror>
    </div>
    <div class="form-group">
    <label for='categorie'> Catégorie </label>
    <select name='category' id='category'>
        @foreach ($categories as $category) { ?>
            <option value={{$category->id}}> {{$category->name}}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    <label for='state'> state</label>
    <select name='state'>
        <option value=todo> todo </option>
        <option value=ongoing> on going </option>
        <option value=done> done </option>
    </select>
    </div>

    <button type="submit"> Sauvegarder </button>

    @error('description')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror 
    @error('title')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror
    @error('due_date')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br/>
<br/>
<a class="btn btn-primary" href="{{route('categories.create')}}"> Ajouter une catégorie</a>
<br/>
<br/>

<div class="row">
    <a class="btn btn-primary m-auto" href="{{route('boards.show',$board->id)}}"> Retour </a>
    </div>
@endsection