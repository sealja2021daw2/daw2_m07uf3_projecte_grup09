@extends('menuadm')

@section('content')

<h1>Llista de voluntaris</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">Voluntari</th>
          <th scope="col">Edat</th>
          <th scope="col">Professio</th>
          <th scope="col">Hores dedicades</th>
        </tr>
    </thead>
    <tbody>
        @foreach($voluntari as $vol)
        <tr>
            <td>{{$vol->nif}}</td>
            <td>{{$vol->edat}}</td>
            <td>{{$vol->professio}}</td>
            <td>{{$vol->h_dedicades}}</td>
            <td class="text-left">
                <a href="{{ route('voluntaris.edit', $vol->nif)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('voluntaris.destroy', $vol->nif)}}" method="post" style="display: inline-block">
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
<br><a href="{{ url('voluntaris/create') }}">Accés directe a la vista de creació de voluntaris</a>
<br><a href="{{ url('menugestiovoluntari') }}">Tornar a la gestio</a>
@endsection