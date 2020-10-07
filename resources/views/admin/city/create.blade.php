@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('cities.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleForName">Nombre</label>
            <input type="text" class="form-control" id="exampleForName" placeholder="New York" name="name">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    </form>

@endsection
