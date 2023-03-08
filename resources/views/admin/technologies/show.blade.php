@extends('layouts.admin')

@section('content')


<h1>Nome Tecnologia: {{ $technology['name'] }}</h1>
<p>Slug Tecnologia: {{ $technology['slug'] }}</p>


@foreach($projects as $project)
    @if($project['technology_id'] == $technology['id'])

        <h1>{{ $project['title'] }}</h1>

    @endif
@endforeach
@endsection('content')