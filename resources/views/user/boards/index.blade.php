@extends('layouts.main')

@section('title', "Les boards de l'utilisateur")

@section ('content')

<table class="table">
<tr>
    <td>ID</td>
    <td>Titre</td>
    <td>Description</td>
    <td>Actions</td>
</tr>
@foreach ($boards as $board)
    <tr>
        <td>{{$board->id}}</td>
        <td>{{$board->title}}</td>
        <td>{{$board->description}}</td>
        <td> <a class="btn btn-info" href="{{route('boards.show',$board->id)}}"> Voir</a></td>
        @can('update',$board)
        <td> <a class="btn btn-success" href="{{route('boards.edit',$board->id)}}"> Modifer</a></td>
        @endcan
        @can('delete',$board)
        <td> <form action="{{route('boards.destroy',$board->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit"> Supprimer </button> 
        </form>
        </td>
        @endcan
    </tr>
@endforeach
</table>

<a class="btn btn-primary" href="{{route('boards.create')}}"> Ajouter un board</a>

@endsection