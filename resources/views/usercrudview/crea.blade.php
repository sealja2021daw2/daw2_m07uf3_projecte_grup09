@extends('menuadm')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix un nou usuari
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
      <form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
              @csrf
              <label for="nomusuari">Username</label>
              <input type="text" class="form-control" name="nomusuari"/>
          </div>
          <div class="form-group">
              <label for="esadmin">Admin</label>
              <select name="esadmin">
                <option value="false">No</option>
                <option value="true">Sí</option>
              </select>
          </div>
          <div class="form-group">
              <label for="contrasena">Password</label>
              <input type="password" class="form-control" name="contrasena"/>
          </div>
          <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom">
          </div>
          <div class="form-group">
              <label for="cognoms">Cognoms</label>
              <input type="text" class="form-control" name="cognoms">
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="mobil">Mobil</label>
              <input type="tel" class="form-control" name="mobil"/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('users') }}">Accés directe a la Llista d'empleats</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection