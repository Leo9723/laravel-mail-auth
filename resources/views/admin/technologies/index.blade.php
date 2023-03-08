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
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Slug</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
  @forelse($technologies as $technology)
    <tr>
      <td>{{ $technology['id'] }}</td>
      <td>{{ $technology['name'] }}</td>
      <td>{{ $technology['slug'] }}</td>
      <td>
        <button class="btn btn-success"><a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="text-white"><i class="fa-solid fa-eye"></i></a></button>
        <button class="btn btn-warning"><a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="text-black"><i class="fa-solid fa-pencil"></i></a></button>
        <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="confirm-delete-technology btn btn-danger" data-name="{{ $technology->name }}" data-bs-toggle="modal_technology" data-bs-target="#delete-technology" data-projectid="{{ $technology->id }}"><i class="fa-solid fa-trash-can"></i></button>
            </form>
      </td>
    </tr>
    @empty
    <tr>
    <td scope="row">
      Nessun progetto presente, aggiungine uno da <a href="{{ route('admin.technologies.create') }}">qui</a>
    </td>
    </tr>
    @endforelse
  </tbody>
</table>

<button><a href="{{ route('admin.technologies.create') }}">Aggiungi un progetto</a></button>

@include('admin.technologies.modal_technology_delete')
@endsection