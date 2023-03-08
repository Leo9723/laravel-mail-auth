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
  @forelse($types as $type)
    <tr>
      <td>{{ $type['id'] }}</td>
      <td>{{ $type['name'] }}</td>
      <td>{{ $type['slug'] }}</td>
      <td>
        <button class="btn btn-success"><a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="text-white"><i class="fa-solid fa-eye"></i></a></button>
        <button class="btn btn-warning"><a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="text-black"><i class="fa-solid fa-pencil"></i></a></button>
        <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="confirm-delete-type btn btn-danger" data-name="{{ $type->name }}" data-bs-toggle="modal_type" data-bs-target="#delete-type" data-projectid="{{ $type->id }}"><i class="fa-solid fa-trash-can"></i></button>
            </form>
      </td>
    </tr>
    @empty
    <tr>
    <td scope="row">
      Nessun progetto presente, aggiungine uno da <a href="{{ route('admin.types.create') }}">qui</a>
    </td>
    </tr>
    @endforelse
  </tbody>
</table>

<button><a href="{{ route('admin.types.create') }}">Aggiungi un progetto</a></button>

@include('admin.types.modal_type_delete')
@endsection