@extends('layouts.main')

@section('title', 'Personagem no Grupo')

@section('content')

  @if (session('msg'))
    <div class="alert alert-danger">
      {{ session('msg') }}
    </div>
  @endif

  <div class="container">
    <div class="cel d-flex justify-content-center text-center">
      <div class="card col-lg-6 mt-3">
        <div class="card-body">
          <div class="col">
            <h1 style="color: #547FBC; font-weight: bold;">Adicionar Personagem ao {{$grupo->nome}}</h1>
            <div class="col-lg-8 mx-auto">
              <form action="{{ route('grupos.addPersonagem') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="grupo_id">Grupo</label>
                <input type="hidden" name="grupo_id" id="grupo_id" value="{{ $grupo->id }}">
                <input readonly class="form-control" name="grupo_name" id="grupo_name" value="{{ $grupo->nome }}"></input>

                <label for="personagem_id">Selecione seu Personagem</label>
                <select class="form-control" name="personagem_id" id="personagem_id">
                  @foreach ($personagens as $personagem)
                    <option value="{{ $personagem->id }}">{{ $personagem->nome }}</option>
                  @endforeach
                </select>
                <button class="btn mt-3" type="submit" style="background-color: #547FBC; color: white;"><i class="fa-solid fa-check"></i></button>
                <a href="{{ route('grupos.gerenciar', $grupo->id) }}" class="btn mt-3"><i class="fa fa-arrow-left"></i></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
