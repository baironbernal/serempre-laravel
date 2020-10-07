@extends('layouts.app')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<br>

<a href="{{ route('cities.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear ciudades</a>
<br><br><br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col"> Nombre</th>
        <th scope="col">Creado</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($cities as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('cities.edit', $item->id) }}" class="btn btn-secondary btn-small active" role="button" aria-pressed="true">Editar</a>
                    
                    <form action="{{ route('cities.destroy', $item->id) }}" method="POST">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-small active">Eliminar</button>
                    </form>
                  </div>
                </td>
          </tr>
        @empty
            <h1>No existen registros aun</h1>
        @endforelse
      
    </tbody>
  </table>
@endsection
