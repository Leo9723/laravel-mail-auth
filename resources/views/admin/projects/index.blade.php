@extends('layouts.admin')
@section('content')


<h1>Progetti</h1>
@if(session()->has('message'))
    <div class="bg-success">
        {{ session()->get('message') }}
    </div>
@endif
<table class="table table-dark table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Titolo</th>
      <th scope="col">Descrizione</th>
      <th scope="col">category_id</th>
      <th scope="col">azioni</th>
    </tr>
  </thead>
  <tbody>
  @forelse($projects as $project)
    <tr>
      <td>{{ $project['title'] }}</td>
      <td>{{ $project['description'] }}</td>
      <td>{{ $project['type_id'] }}</td>
      <td>
        <button class="btn btn-success"><a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="text-white"><i class="fa-solid fa-eye"></i></a></button>
        <button class="btn btn-warning"><a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="text-black"><i class="fa-solid fa-pencil"></i></a></button>
        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="confirm-delete-project btn btn-danger" data-title="{{ $project->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal-project" data-projectid="{{ $project->id }}"><i class="fa-solid fa-trash-can"></i></button>
            </form>
      </td>
    </tr>
    @empty
    <tr>
    <td scope="row">
      Nessun progetto presente, aggiungine uno da <a href="{{ route('admin.projects.create') }}">qui</a>
    </td>
    </tr>
    @endforelse
  </tbody>
</table>

<button><a href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a></button>

@include('admin.projects.modal_delete')
@endsection