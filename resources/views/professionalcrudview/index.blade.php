@extends('menuadm')

@section('content')

<h1>Llista de professionals</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover" >
    <thead >
        <tr class="table-primary ">
          <th scope="col">Professional</th>
          <th scope="col">Carrec</th>
          <th scope="col">Quant paga a la seguretat social</th>
          <th scope="col">irpf descompte</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professional as $prof)
        <tr>
            <td>{{$prof->nif}}</td>
            <td>{{$prof->carrec}}</td>
            <td>{{$prof->q_paga_SSocial}}</td>
            <td>{{$prof->irpf_descomp}}</td>
            <td class="text-left">
                <a href="{{ route('professionals.edit', $prof->nif)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('professionals.destroy', $prof->nif)}}" method="post" style="display: inline-block">
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
<br><a href="{{ url('professionals/create') }}">Accés directe a la vista de creació de professionals</a>
<br><a href="{{ url('menugestioprofessional') }}">Tornar a la gestio</a>
@endsection