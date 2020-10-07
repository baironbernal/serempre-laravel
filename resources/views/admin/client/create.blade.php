@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleForName">Nombre</label>
            <input type="text" class="form-control" id="exampleForName" placeholder="Laura Arango" name="name">
        </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Ciudades</label>
                <select class="form-control" id="exampleFormControlSelect1" name="city_id">
                    @foreach ($cities as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>    
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    </form>

@endsection
