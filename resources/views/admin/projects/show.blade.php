@extends('layouts.admin')

@section('content')

<img src="{{ asset('storage/' .$project->cover_image) }}" alt="{{ $project->title }}">
<h1>Titolo Progetto: {{ $project['title'] }}</h1>
<p>Descrizione Progetto: {{ $project['description'] }}</p>
<p>Tipologia : {{ $project->type ? $project->type->name : 'senza tipologia' }}</p>
<p>Tecnologie: 

@foreach($project->technologies as $technology)
    @if(!$loop->last)
        {{ $technology->name }},
    @else
        {{ $technology->name }}
    @endif

@endforeach

</p>

@endsection('content')