@extends('menu')

@section('content')

<h1>Llista de socis en ong's</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">Cif de ong</th>
          <th scope="col">Nif de soci</th>
        </tr>
    </thead>
    <tbody>
        @foreach($formade as $fo)
        <tr>
            <td>{{$fo->cif_ong}}</td>
            <td>{{$fo->nif_soci}}</td>
            <td class="text-left">
                <a href="{{ url('formadeedit/'.$fo->cif_ong.'/'.$fo->nif_soci)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ url('formadedel/'.$fo->cif_ong.'/'.$fo->nif_soci)}}" method="post" style="display: inline-block">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @if ($errores ?? '')
                <div class="alert alert-danger" role="alert">
                    {{ $errores }}
                </div>
  @endif
<div>
<br><a href="{{ url('formades/create') }}">Accés directe a la vista de d'unio entre socis i ongs</a>
<br><a href="{{ url('menugestioong') }}">Tornar a la gestio</a>
@endsection