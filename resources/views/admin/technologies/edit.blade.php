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
    <form action="{{ route('admin.technologies.update', $technology->id)}}" method="POST">
    @csrf
    @method('PUT')


    <label for="title">Inserisci il nuovo nome della Tecnologia:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') ?? $technology->name }}"><br>
    @error('name')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror

    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')