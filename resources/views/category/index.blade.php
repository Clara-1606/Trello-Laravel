@extends('layouts.main')

@section('title', 'Display a category')

@section ('content')

<table class="table">
<tr>
    <td>ID</td>
    <td>Name</td>
    <td>Actions</td>
</tr>
@foreach ($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td> <a class="btn btn-info" href="{{route('categories.show',$category->id)}}"> Voir</a></td>
        <td> <a class="btn btn-success" href="{{route('categories.edit',$category->id)}}"> Modifer</a></td>
        <td> <form action="{{route('categories.destroy',$category->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button>
        </td>
    </tr>
@endforeach
</table>

<a class="btn btn-primary" href="{{route('categories.create')}}"> Ajouter une catégorie</a>

@endsection