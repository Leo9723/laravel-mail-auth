@extends('layouts.admin')

@section('content')

@if($errors->any())
<ul class="text-danger bg-black mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="form-cont">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="" class="control-label">
            <input type="file" name="cover_image" id="cover_image">
        </label>
    </div>

    <div class="select">
        <label class="Control-lable">Tipologie</label>
        <select class="form-control" name="type_id" id="type_id">
        @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
        </select>
    </div>

    <label for="title">Inserisci il titolo del progetto:</label><br>
    <input type="text" name="title" id="title"><br>
    <div class="error">
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>


    <label for="title">Inserisci una descrizione del progetto:</label><br>
    <textarea name="description" id="description" rows="10"></textarea><br>
    <div class="error">
    @error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror

        <div class="form-group">
            <label class="control-lable" for="">tecnologie:</label>
            @foreach($technologies as $technology)

                <input type="checkbox" name="technologies[]" class="form-check-input" value="{{ $technology->id }}">
                <label class="form-check-label">{{ $technology->name }}</label>

            @endforeach
        </div>
    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')