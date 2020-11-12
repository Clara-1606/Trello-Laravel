@extends('layouts.app')

@section('title', 'Display a category')

@section ('content')
<p> Ma catégorie à l'id : {{$category->id}}</p>
<p> Ma catégorie s'appelle : {{$category->name}}</p>
<p> Ma catégorie à l'id : {{$category->id}}</p>
<p> Ma catégorie à été crée : {{$category->id}}</p>

@endsection