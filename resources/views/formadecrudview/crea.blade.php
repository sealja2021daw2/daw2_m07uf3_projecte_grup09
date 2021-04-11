@extends('menuadm')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix un soci a una ong
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
      <form method="post" action="{{ route('formades.store') }}">
          <div class="form-group">
              @csrf
      
          <div class="form-group">
              <label for="cif_ong">ONG</label>
              <select name="cif_ong">
                @foreach($ong as $on)
                    <option value="{{ $on->cif }}">{{ $on->cif }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="nif_soci">SOCI</label>
              <select name="nif_soci">
                @foreach($soci as $soc)
                    <option value="{{ $soc->nif }}">{{ $soc->nif }}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('formades') }}">Accés directe a la Llista de unions de socis a ongs</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection