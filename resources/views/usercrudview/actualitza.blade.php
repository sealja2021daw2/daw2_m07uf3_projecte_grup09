@extends('menuadm')

@section('content')


<div class="card mt-5">
    <div class="card-header">
        Actualització de dades
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
        <form method="post" action="{{ route('users.update', $user->nomusuari) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nomusuari">nomusuari</label>
                <input type="text" class="form-control" name="nomusuari" value="{{ $user->nomusuari }}" />
            </div>
            <div class="form-group">
                <label for="esadmin">Admin</label>
                <select name="esadmin">
                    <option value="false" {{($user->esadmin === 0) ? 'Selected' : ''}}>No</option>
                    <option value="true" {{($user->esadmin === 1) ? 'Selected' : ''}}>Sí</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contrasena">Password</label>
                <input type="password" value="{{ $user->contrasena }}" class="form-control" name="contrasena"/>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" value="{{ $user->nom }}" name="nom">
            </div>
            <div class="form-group">
                <label for="cognoms">Cognoms</label>
                <input type="text" class="form-control" value="{{ $user->cognoms }}" name="cognoms">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ $user->email }}" class="form-control" name="email"/>   
            </div>
            <div class="form-group">
                <label for="mobil">Mobil</label>
                <input type="tel" class="form-control" value="{{ $user->mobil }}" name="mobil"/> 
            </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('users') }}">Accés directe a la Llista d'usuaris</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection