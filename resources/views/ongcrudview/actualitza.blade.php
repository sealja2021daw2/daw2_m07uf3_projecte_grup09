@extends('menu')

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
        <form method="post" action="{{ route('ongs.update', $ong->cif) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="cif">cif</label>
                <input type="text" class="form-control" name="cif" value="{{ $ong->cif }}" />
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $ong->nom }}" />
            </div>
            <div class="form-group">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control" value="{{ $ong->adreca }}" name="adreca">
            </div>
            <div class="form-group">
                <label for="poblacio">Poblacio</label>
                <input type="text" class="form-control" value="{{ $ong->poblacio }}" name="poblacio">
            </div>
            <div class="form-group">
                <label for="comarca">Comarca</label>
                <input type="text" class="form-control" value="{{ $ong->comarca }}" name="comarca">
            </div>
            <div class="form-group">
                <label for="tipus_ong">Tipus de ong</label>
                <input type="text" class="form-control" value="{{ $ong->tipus_ong }}" name="tipus_ong">
            </div>
            <div class="form-group">
                <label for="utilpublicgencat">utilpublicgencat</label>
                <select name="utilpublicgencat">
                    <option value="false" {{($ong->utilpublicgencat === 0) ? 'Selected' : ''}}>No</option>
                    <option value="true" {{($ong->utilpublicgencat === 1) ? 'Selected' : ''}}>Sí</option>
                </select>
            </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('users') }}">Accés directe a la Llista d'usuaris</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection