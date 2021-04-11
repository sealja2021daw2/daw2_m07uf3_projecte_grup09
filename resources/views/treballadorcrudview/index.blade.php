@extends('menuadm')

@section('content')

<h1>Llista de treballadors</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">Nif</th>
          <th scope="col">Nom</th>
          <th scope="col">Cognoms</th>
          <th scope="col">Adreça</th>
          <th scope="col">Poblacio</th>
          <th scope="col">Comarca</th>
          <th scope="col">Telefon</th>
          <th scope="col">Mobil</th>
          <th scope="col">Email</th>
          <th scope="col">Data d'ingres</th>
          <th scope="col">ONG</th>
        </tr>
    </thead>
    <tbody>
        @foreach($treballador as $treb)
        <tr>
            <td>{{$treb->nif}}</td>
            <td>{{$treb->nom}}</td>
            <td>{{$treb->cognoms}}</td>
            <td>{{$treb->adreca}}</td>
            <td>{{$treb->poblacio}}</td>
            <td>{{$treb->comarca}}</td>
            <td>{{$treb->telefon}}</td>
            <td>{{$treb->mobil}}</td>
            <td>{{$treb->email}}</td>
            <td>{{$treb->d_ingres}}</td>
            <td>{{$treb->cif_ong}}</td>
            <td class="text-left">
                <a href="{{ route('treballadors.edit', $treb->nif)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('treballadors.destroy', $treb->nif)}}" method="post" style="display: inline-block">
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
<br><a href="{{ url('treballadors/create') }}">Accés directe a la vista de creació de treballadors</a>
<br><a href="{{ url('menugestiotreballador') }}">Tornar a la gestio</a>
@endsection