
@extends('layouts.main')

@section('title', 'Gerenciar Personagens')

@section('content')

@if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
@endif

<div class="container text-center">
  <h1 class="text-center" style="color: #FFD700; font-weight: bold">Gerenciar Personagens</h1>
  <div class="row mt-5 justify-content-center">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/pt_personagens.jpg" class="card-img-top" width="300" height="400" alt="Ver Personagens">
        <h2 class="text-center" style="color: #FFD700;">Ver Personagens</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.allPersonagens', $grupo->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;">Ver Personagens</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/pt_novo.jpg" class="card-img-top" width="300" height="400" alt="Adicionar Personagens">
        <h2 class="text-center" style="color: #FFD700;">Adicionar Personagens</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.personagens', $grupo->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;"><i class="fa fa-plus"></i> Adicionar Personagens</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
