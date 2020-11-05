@extends('layouts.app')

@section('title', 'Display a category')

@section ('content')
@foreach ($categories as $category)
    <h2>{{$category->name}}</h2>

@endforeach

@endsection