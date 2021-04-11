@extends('menuadm')

@section('content')

<div class="card mt-5 ">
  <div class="card-header">
    Afegeix un nou professional
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
      <form method="post" action="{{ route('professionals.store') }}">
          <div class="form-group">
              @csrf
              <label for="nif">Treballador</label>
              <select name="nif">
                @foreach($treballador as $treb)
                    <option value="{{ $treb->nif }}">{{ $treb->nif }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
          <label for="carrec">Carrer</label>
              <input type="text" class="form-control" name="carrec"/>
          </div>
          <div class="form-group">
          <div class="form-group">
              <label for="q_paga_SSocial">Quant paga a la Seguretat Social</label>
              <input type="number" step="0.01" min="0" class="form-control" name="q_paga_SSocial">
          <div>
          <label for="irpf_descomp">Irpf descompte</label>
              <input type="number" step="0.01" min="0" class="form-control" name="irpf_descomp"/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('professionals') }}">Accés directe a la Llista de professionals</a>
<br><a href="{{ url('menugestioprofessional') }}">Tornar a la gestio</a>
@endsection