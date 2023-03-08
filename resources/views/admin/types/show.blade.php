@extends('layouts.admin')

@section('content')


<h1>Nome Tipologia: {{ $type['name'] }}</h1>
<p>Slug Tipologia: {{ $type['slug'] }}</p>


@foreach($projects as $project)
    @if($project['type_id'] == $type['id'])

        <h1>{{ $project['title'] }}</h1>

    @endif
@endforeach
@endsection('content')