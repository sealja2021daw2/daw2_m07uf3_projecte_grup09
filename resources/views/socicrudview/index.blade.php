@extends('menu')

@section('content')

<h1>Llista de socis</h1>
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
          <th scope="col">telefon</th>
          <th scope="col">Mobil</th>
          <th scope="col">Email</th>
          <th scope="col">Data alta</th>
          <th scope="col">Quota mensual</th>
          <th scope="col">Donacions</th>
          <th scope="col">Aportacio anual</th>
        </tr>
    </thead>
    <tbody>
        @foreach($soci as $soc)
        <tr>
            <td>{{$soc->nif}}</td>
            <td>{{$soc->nom}}</td>
            <td>{{$soc->cognoms}}</td>
            <td>{{$soc->adreca}}</td>
            <td>{{$soc->poblacio}}</td>
            <td>{{$soc->comarca}}</td>
            <td>{{$soc->telefon}}</td>
            <td>{{$soc->mobil}}</td>
            <td>{{$soc->email}}</td>
            <td>{{$soc->d_alta}}</td>
            <td>{{$soc->q_mensual}}</td>
            <td>{{$soc->donacio}}</td>
            <td>{{$soc->aport_anual}}</td>
            <td class="text-left">
                <a href="{{ route('socis.edit', $soc->nif)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('socis.destroy', $soc->nif)}}" method="post" style="display: inline-block">
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
<br><a href="{{ url('socis/create') }}">Accés directe a la vista de creació d'usuaris</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection