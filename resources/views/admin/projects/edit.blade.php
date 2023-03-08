@extends('layouts.admin')

@section('content')

@if($errors->any())
<ul class="text-danger bg-black mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<img src="{{ asset('storage/' .$project->cover_image) }}" alt="{{ $project->title }}">

<div class="form-cont">
    <form action="{{ route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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

    <label for="title">Inserisci il nuovo titolo del progetto:</label><br>
    <input type="text" name="title" id="title" value="{{ old('title') ?? $project->title }}"><br>
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror


    <label for="title">Inserisci la nuova descrizione del progetto:</label><br>
    <textarea name="description" id="description" rows="10">{{ old('description') ?? $project->description }}</textarea><br>
    @error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror

        <div class="form-group">
            <label class="control-lable" for="">tecnologie:</label>
            @foreach($technologies as $technology)

                <input type="checkbox" name="technologies[]" class="form-check-input" value="{{ $technology->id }}" {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $technology->name }}</label>

            @endforeach
        </div>
    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')