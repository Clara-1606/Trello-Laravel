@extends('layouts.main')

@section('title', 'Update a category')

@section ('content')

<form method="POST" action="{{route('categories.update',$category->id)}}">
    @csrf
    @method('PATCH')
    <div class="form-group">
    <label for='name'> Category Name </label>
    <input type="text" value={{$category->name}} id="name" name="name" class=@error('name') is-invalid @enderror>
</div>
    @error('name')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror 
    <button type="submit"> Sauvegarder </button>
</form>

<div class="row">
    <a class="btn btn-primary m-auto" href="{{route('categories.index')}}"> Retour </a>
    </div>

@endsection