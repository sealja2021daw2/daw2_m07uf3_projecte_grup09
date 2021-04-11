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
        <form method="post" action="{{ route('professionals.update', $professional->nif) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="cif_ong">Treballador</label>
                <select name="nif">
                @foreach($treballador as $tr)
                    <option value="{{ $tr->nif }}" {{($tr->nif == $professional->nif) ? 'Selected' : ''}}>{{ $tr->nif }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="carrec">Carrec</label>
                <input type="text" class="form-control" name="carrec" value="{{ $professional->carrec }}"/>
            </div>
                <div class="form-group">
                    <label for="q_paga_SSocial">Quant paga a la Seguretat Social</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="q_paga_SSocial" value="{{ $professional->q_paga_SSocial }}">
                </div>
                <div class="form-group">
                    <label for="irpf_descomp">Irpf descompte</label>
                    <input type="number" value="{{ $professional->irpf_descomp }}" step="0.01" min="0" class="form-control" name="irpf_descomp"/>
                </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('professionals') }}">Accés directe a la Llista de professionals</a>
<br><a href="{{ url('menugestioprofessional') }}">Tornar a la gestio</a>
@endsection