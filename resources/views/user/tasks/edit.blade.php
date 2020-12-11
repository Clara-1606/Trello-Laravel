@extends('layouts.main')

@section('title', 'Add Tasks')

@section ('content')
<form method="POST" action={{route('tasks.update',$task->id)}}>
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for='title'> Title</label>
    <input value={{$task->title}} type="text" id="title" name="title" class=@error('title') is-invalid @enderror>
    </div>
    <div class="form-group">
    <label for='description'> Description</label>
    <input
    value={{$task->description}} type="textarea" id="description" name="description" class=@error('description') is-invalid @enderror>
    </div>
    <div class="form-group">
    <label for='due_date'> due_date</label>
    <input value={{$task->due_date}} type="date" id="due_date" name="due_date" class=@error('due_date') is-invalid @enderror>
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
@endsection