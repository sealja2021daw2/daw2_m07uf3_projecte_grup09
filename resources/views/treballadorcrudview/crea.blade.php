@extends('menuadm')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix un nou treballador
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
      <form method="post" action="{{ route('treballadors.store') }}">
          <div class="form-group">
              @csrf
              <label for="nif">Nif</label>
              <input type="text" class="form-control" name="nif"/>
          </div>
          <div class="form-group">
          <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="cognoms">Cognoms</label>
              <input type="text" class="form-control" name="cognoms">
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
              <label for="telefon">Telefon</label>
              <input type="tel" class="form-control" name="telefon"/>
          </div>
          <div class="form-group">
              <label for="mobil">Mobil</label>
              <input type="tel" class="form-control" name="mobil"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="d_ingres">Data d'ingres</label>
              <input type="text" class="form-control" name="d_ingres">
          </div>
          <div class="form-group">
              <label for="cif_ong">ONG</label>
              <select name="cif_ong">
                @foreach($ong as $on)
                    <option value="{{ $on->cif }}">{{ $on->cif }}</option>
                @endforeach
              </select>
          </div>
          
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('treballadors') }}">Accés directe a la Llista d'empleats</a>
<br><a href="{{ url('menugestiotreballador') }}">Tornar a la gestio</a>
@endsection