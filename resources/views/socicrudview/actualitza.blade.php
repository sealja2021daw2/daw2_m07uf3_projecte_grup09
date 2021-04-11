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
        <form method="post" action="{{ route('socis.update', $soci->nif) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nif">Nif</label>
                <input type="text" class="form-control" name="nif" value="{{ $soci->nif }}" />
            </div>
            <div>
            <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $soci->nom }}"/>
            </div>
            <div class="form-group">
                <label for="cognoms">Cognoms</label>
                <input type="text" class="form-control" name="cognoms" value="{{ $soci->cognoms }}">
            </div>
            <div class="form-group">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control" name="adreca" value="{{ $soci->adreca }}">
            </div>
            <div class="form-group">
                <label for="poblacio">Poblacio</label>
                <input type="text" class="form-control" name="poblacio" value="{{ $soci->poblacio }}">
            </div>
            <div class="form-group">
                <label for="comarca">Comarca</label>
                <input type="text" class="form-control" name="comarca" value="{{ $soci->comarca }}">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="tel" class="form-control" name="telefon" value="{{ $soci->telefon }}"/>
            </div>
            <div class="form-group">
                <label for="mobil">Mobil</label>
                <input type="tel" class="form-control" name="mobil" value="{{ $soci->mobil }}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $soci->email }}"/>
            </div>
            <div class="form-group">
                <label for="d_alta">Data d'alta</label>
                <input type="text" class="form-control" name="d_alta" value="{{ $soci->d_alta }}">
            </div>
            <div class="form-group">
                <label for="q_mensual">Quota mensual</label>
                <input type="number" class="form-control" step="0.01" min="0" name="q_mensual" value="{{ $soci->q_mensual }}"/>
            </div>
            <div class="form-group">
                <label for="donacio">Afegeix més donacions</label>
                <input type="number" class="form-control" step="0.01" min="0" name="donacio" value="{{ $soci->donacio }}"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('socis') }}">Accés directe a la Llista d'socis</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection