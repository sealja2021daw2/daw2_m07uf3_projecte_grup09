@extends('menu')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix un nou voluntari
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('voluntaris.store') }}">
          <div class="form-group">
              @csrf
              <label for="nif">Treballador</label>
              <select name="nif">
                @foreach($treballador as $treb)
                    <option value="{{ $treb->nif }}">{{ $treb->nif }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="edat">edat</label>
              <input type="number"  class="form-control" name="edat">
          <div>
          <div>
          <label for="professio">Professio</label>
              <input type="text" class="form-control" name="professio"/>
          </div>
          <div class="form-group">
              <label for="h_dedicades">Hores dedicades</label>
              <input type="number"  class="form-control" name="h_dedicades">
          <div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('voluntaris') }}">Accés directe a la Llista de voluntaris</a>
<br><a href="{{ url('menugestiovoluntari') }}">Tornar a la gestio</a>
@endsection