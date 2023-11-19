
@extends('layouts.main')

@section('title', 'Gerenciar Personagens')

@section('content')

@if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
@endif

<div class="container">
  <h1 class="text-center" style="color: #547FBC; font-weight: bold">Gerenciar Personagens em {{$grupo->nome}}</h1>
  <hr>
  <a href="{{ route('grupos.index') }}" class="btn" style="font-family: bold; background-color: #547FBC; color: white;"><i class="fa fa-arrow-left"></i></a>
  <div class="row mt-5 justify-content-center">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/pt_personagens.jpg" class="card-img-top" width="300" height="400" alt="Ver Personagens">
        <h2 class="text-center" style="color: #547FBC;">Ver Personagens</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.allPersonagens', $grupo->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa fa-eye"></i></a>
          </div>
        </div>
      </div>
    </div>
    @if ($grupo->usuario == auth()->user()->id)
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/pt_novo.jpg" class="card-img-top" width="300" height="400" alt="Adicionar Personagens">
        <h2 class="text-center" style="color: #547FBC;">Adicionar Personagens</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.personagens', $grupo->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa fa-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
