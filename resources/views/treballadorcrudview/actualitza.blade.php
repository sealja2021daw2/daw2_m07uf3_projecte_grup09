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
        <form method="post" action="{{ route('treballadors.update', $treballador->nif) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nif">Nif</label>
                <input type="text" class="form-control" name="nif" value="{{ $treballador->nif }}" />
            </div>
            <div>
            <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $treballador->nom }}"/>
            </div>
            <div class="form-group">
                <label for="cognoms">Cognoms</label>
                <input type="text" class="form-control" name="cognoms" value="{{ $treballador->cognoms }}">
            </div>
            <div class="form-group">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control" name="adreca" value="{{ $treballador->adreca }}">
            </div>
            <div class="form-group">
                <label for="poblacio">Poblacio</label>
                <input type="text" class="form-control" name="poblacio" value="{{ $treballador->poblacio }}">
            </div>
            <div class="form-group">
                <label for="comarca">Comarca</label>
                <input type="text" class="form-control" name="comarca" value="{{ $treballador->comarca }}">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="tel" class="form-control" name="telefon" value="{{ $treballador->telefon }}"/>
            </div>
            <div class="form-group">
                <label for="mobil">Mobil</label>
                <input type="tel" class="form-control" name="mobil" value="{{ $treballador->mobil }}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $treballador->email }}"/>
            </div>
            <div class="form-group">
                <label for="d_ingres">Data d'ingres</label>
                <input type="text" class="form-control" name="d_ingres" value="{{ $treballador->d_ingres }}">
            </div>
            <div class="form-group">
                <label for="cif_ong">ONG</label>
                <select name="cif_ong">
                @foreach($ong as $on)
                    <option value="{{ $on->cif }}" {{($on->cif == $treballador->cif_ong) ? 'Selected' : ''}}>{{ $on->cif }}</option>
                @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('socis') }}">Accés directe a la Llista d'socis</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection