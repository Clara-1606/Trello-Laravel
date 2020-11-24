@extends('layouts.main')

@section('title', 'Create a category')

@section ('content')
<form method="POST" action="/categories">
    @csrf
    
    <label for='name'> Category Name </label>
    <input type="text" id="name" name="name" class=@error('name') is-invalid @enderror>

    @error('name')
    <div class="alert alert-danger"> {{$message}} </div>
    @enderror 
    <button type="submit"> Sauvegarder </button>

</form>
@endsection