@extends('layouts.main')

@section('title', 'Display a category')

@section ('content')
<p> Ma catégorie à l'id : {{$category->id}}</p>
<p> Ma catégorie s'appelle : {{$category->name}}</p>
<p> Ma catégorie à l'id : {{$category->id}}</p>
<p> Ma catégorie à été crée le : {{$category->created_at}}</p>
<p> Ma catégorie à été modifié le : {{$category->updated_at}}</p>

@endsection