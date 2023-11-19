@extends('layouts.main')

@section('title', 'Detalhes da Magia')

@section('content')
@if (session('msg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('msg') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="container">
  <div class="cel d-flex justify-content-center text-center">
    <div class="card col-lg-9 mt-3 text-center">
      <div class="card-body">
        <div class="row text-start">
          
            <table class="table table-striped">
              <tr>
                <th>Nome: </th>
                <td>{{ $magia->name }}</td>
              </tr>
              <tr>
                <th>Descrição: </th>
                <td>
                  @foreach ($magia->desc as $descricao)
                    <p>{{ $descricao }}</p>
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>Alcance: </th>
                <td>{{ $magia->range }}</td>
              </tr>
              <tr>
                <th>Componentes: </th>
                <td>
                  @foreach ($magia->components as $componente)
                    <p>{{ $componente }}</p>
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>Ritual: </th>
                <td>{{ $magia->ritual ? 'Sim' : 'Não' }}</td>
              </tr>
              <tr>
                <th>Duração: </th>
                <td>{{ $magia->duration }}</td>
              </tr>
              <tr>
                <th>Concentração: </th>
                <td>{{ $magia->concentration ? 'Sim' : 'Não' }}</td>
              </tr>
              <tr>
                <th>Tempo de Conjuração: </th>
                <td>{{ $magia->casting_time }}</td>
              </tr>
              <tr>
                <th>Nível: </th>
                <td>{{ $magia->level }}</td>
              </tr>
              
              <tr>
                <th>Tipo de Dano: </th>
                <td>
                  @if (isset($magia->damage->damage_type->name))
                    {{ $magia->damage->damage_type->name }}
                  @else
                    <p>N/A</p>
                  @endif
                </td>
              </tr>
              <tr>
                <th>Dano por Nível: </th>
                <td>
                    @if (isset($magia->damage->damage_at_character_level))
                        @foreach ($magia->damage->damage_at_character_level as $level => $damage)
                            <p>Nível {{ $level }}: {{ $damage }}</p>
                        @endforeach
                    @else
                        <p>N/A</p>
                    @endif
                </td>
              </tr>
              <tr>
                <th>Escola: </th>
                <td>{{ $magia->school->name }}</td>
              </tr>
              <tr>
                <th>Classes: </th>
                <td>
                  @foreach ($magia->classes as $classe)
                    <p>{{ $classe->name }}</p>
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>Subclasses: </th>
                <td>
                  @foreach ($magia->subclasses as $subclasse)
                    <p>{{ $subclasse->name }}</p>
                  @endforeach
                </td>
              </tr>
            </table>
          
          <div class="text-end">
            <a class="button btn" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
