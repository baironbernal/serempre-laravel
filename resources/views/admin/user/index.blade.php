@extends('layouts.app')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br><br>
@endif

<a href="{{ route('users.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Usuario</a>
<br><br><br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col"> Nombre</th>
        <th scope="col"> Correo</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($users as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-secondary btn-small active" role="button" aria-pressed="true">Editar</a>

                    <form action="{{ route('users.destroy', $item->id) }}" method="POST">
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
    {!! $users->links() !!}
  </table>
@endsection
