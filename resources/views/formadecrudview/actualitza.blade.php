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
        <form method="post" action="{{ url('formadeup/'.$formade->cif_ong.'/'.$formade->nif_soci) }}" method="post">
            <div class="form-group">
                @csrf
                <label for="cif_ong">Cif de ong</label>
                <input type="text" class="form-control" name="cif_ong" value="{{ $formade->cif_ong }}" />
            </div>
            <div class="form-group">
                <label for="nif_ong">Nif de soci</label>
                <input type="text" class="form-control" name="nif_soci" value="{{ $formade->nif_soci }}" />
            </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
        @if ($errores ?? '')
                <div class="alert alert-danger" role="alert">
                    {{ $errores }}
            </div>
        @endif
    </div>
</div>
<br><a href="{{ url('formades') }}">Accés directe a la Llista de socis a ong's</a>
<br><a href="{{ url('menugestiouser') }}">Tornar a la gestio</a>
@endsection