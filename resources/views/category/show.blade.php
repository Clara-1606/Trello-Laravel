@extends('layouts.app')

@section('title', 'Display a category')

@section ('content')
<h2>{{$cat->name}}</h2>
<p> Ma catégorie à l'id : {{$cat->id}}</p>

@endsection