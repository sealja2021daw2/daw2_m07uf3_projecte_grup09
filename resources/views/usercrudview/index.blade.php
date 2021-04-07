@extends('menuadm')

@section('content')

<h1>Llista d'usuaris</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">nomusuari</th>
          <th scope="col">esadmin</th>
          <th scope="col">contrasena</th>
          <th scope="col">nom</th>
          <th scope="col">cognoms</th>
          <th scope="col">email</th>
          <th scope="col">mobil</th>
          <th scope="col">h_entrada</th>
          <th scope="col">h_sortida</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $usr)
        <tr>
            <td>{{$usr->nomusuari}}</td>
            <td>{{$usr->esadmin}}</td>
            <td>{{$usr->contrasena}}</td>
            <td>{{$usr->nom}}</td>
            <td>{{$usr->cognoms}}</td>
            <td>{{$usr->email}}</td>
            <td>{{$usr->mobil}}</td>
            <td>{{$usr->h_entrada}}</td>
            <td>{{$usr->h_sortida}}</td>
            <td class="text-left">
                <a href="{{ route('users.edit', $usr->nomusuari)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('users.destroy', $usr->nomusuari)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<br><a href="{{ url('users/create') }}">Accés directe a la vista de creació d'empleats</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection