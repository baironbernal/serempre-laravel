@extends('layouts.app')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br><br>
@endif

@php
    if(session()->has('selected')) {
      $selected = session()->get('selected');
    }
@endphp

<a href="{{ route('clients.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Cliente</a>
<br><br><br>


  <div class="row">
    <div class="col">
      <select class="form-control" id="city_id" name="city_id" onchange="location = this.value;">
        @foreach ($cities as $item)      
            <option value="{{ route('by.city', $item->id) }}" {{ (isset($selected) and $selected == $item->id)? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
    </div>
  </div>

<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col"> Nombre</th>
        <th scope="col"> Ciudad</th>
        <th scope="col">Creado</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($clients as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->city->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('clients.edit', $item->id) }}" class="btn btn-secondary btn-small active" role="button" aria-pressed="true">Editar</a>
                    
                    <form action="{{ route('clients.destroy', $item->id) }}" method="POST">
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
  {!! $clients->links() !!}
  
@endsection
