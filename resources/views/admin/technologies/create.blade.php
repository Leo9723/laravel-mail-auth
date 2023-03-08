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
    <form action="{{ route('admin.technologies.store') }}" method="POST">
    @csrf


    <label for="title">Inserisci il nome della Tecnologia:</label><br>
    <input type="text" name="name" id="name"><br>
    <div class="error">
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>

    <label for="title">Inserisci lo slug della Tecnologia:</label><br>
    <input type="text" name="slug" id="slug"><br>
    <div class="error">
    @error('slug')
    <div class="text-danger">
        {{ $message }}
    </div>
        @enderror
    </div>
    
    <input type="submit" value="Invia" class="sub">
    
    
    </form>
</div>


@endsection('content')