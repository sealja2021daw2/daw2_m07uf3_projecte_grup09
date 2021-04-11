@extends('menu')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix una nova ong
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
      <form method="post" action="{{ route('ongs.store') }}">
          <div class="form-group">
              @csrf
              <label for="cif">Cif</label>
              <input type="text" class="form-control" name="cif"/>
          </div>
          <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom">
          </div>
          <div class="form-group">
              <label for="adreca">Adreça</label>
              <input type="text" class="form-control" name="adreca">
          </div>
          <div class="form-group">
              <label for="poblacio">Poblacio</label>
              <input type="text" class="form-control" name="poblacio">
          </div>
          <div class="form-group">
              <label for="comarca">Comarca</label>
              <input type="text" class="form-control" name="comarca">
          </div>
          <div class="form-group">
              <label for="tipus_ong">Tipus de ong</label>
              <input type="text" class="form-control" name="tipus_ong">
          </div>
          <div class="form-group">
              <label for="utilpublicgencat">utilpublicgencat</label>
              <select name="utilpublicgencat">
                <option value="false">No</option>
                <option value="true">Sí</option>
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('users') }}">Accés directe a la Llista d'empleats</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection