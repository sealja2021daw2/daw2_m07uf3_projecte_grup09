@extends('menuadm')

@section('content')

<h1>Llista d'ongs</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">cif</th>
          <th scope="col">Nom</th>
          <th scope="col">Adreça</th>
          <th scope="col">Poblacio</th>
          <th scope="col">Comarca</th>
          <th scope="col">Tipus de ong</th>
          <th scope="col">utilpublicgencat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ong as $onga)
        <tr>
            <td>{{$onga->cif}}</td>
            <td>{{$onga->nom}}</td>
            <td>{{$onga->adreca}}</td>
            <td>{{$onga->poblacio}}</td>
            <td>{{$onga->comarca}}</td>
            <td>{{$onga->tipus_ong}}</td>
            <td>{{$onga->utilpublicgencat}}</td>
            <td class="text-left">
                <a href="{{ route('ongs.edit', $onga->cif)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('ongs.destroy', $onga->cif)}}" method="post" style="display: inline-block">
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
<br><a href="{{ url('ongs/create') }}">Accés directe a la vista de creació d'ong's</a>
<br><a href="{{ url('menugestioong') }}">Tornar a la gestio</a>
@endsection