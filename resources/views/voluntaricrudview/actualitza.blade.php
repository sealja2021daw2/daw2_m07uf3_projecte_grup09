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
        <form method="post" action="{{ route('voluntaris.update', $voluntari->nif) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="cif_ong">voluntari</label>
                <select name="nif">
                @foreach($treballador as $tr)
                    <option value="{{ $tr->nif }}" {{($tr->nif == $voluntari->nif) ? 'Selected' : ''}}>{{ $tr->nif }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="edat">Quant paga a la Seguretat Social</label>
                    <input type="number" class="form-control" name="edat" value="{{ $voluntari->edat }}">
                </div>
            <div class="form-group">
                <label for="professio">Professio</label>
                <input type="text" class="form-control" name="professio" value="{{ $voluntari->professio }}"/>
            </div>
                <div class="form-group">
                    <label for="h_dedicades">Hores dedicades</label>
                    <input type="number" value="{{ $voluntari->h_dedicades }}"  class="form-control" name="h_dedicades"/>
                </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('voluntaris') }}">Accés directe a la Llista de voluntaris</a>
<br><a href="{{ url('menugestiovoluntari') }}">Tornar a la gestio</a>
@endsection