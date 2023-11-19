
@extends('layouts.main')

@section('title', 'Gerenciar Itens')

@section('content')

@if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
@endif

<div class="container">

  <h1 style="color: #547FBC; font-weight: bold;" class="text-center">Gerenciar Itens - {{ $personagem->nome }}</h1>
  <hr>
  <a href="{{ route('personagens.index') }}" class="btn mb-3 ms-2" style="background-color: #547FBC; font-weight: bold; color: white;"><i class="fa fa-arrow-left"></i></a>

  
  <div class="row mt-5 justify-content-center">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/swords.jpeg" class="card-img-top" width="300" height="400" alt="Adicionar Item">
        <h2 class="text-center" style="color: #547FBC;">Itens no Inventário</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('itens.utilizados', $personagem->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa fa-eye"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/itens.jpeg" class="card-img-top" width="300" height="400" alt="Ver Itens">
        <h2 class="text-center" style="color: #547FBC;">Adicionar Item</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('itens.index', $personagem->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa fa-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
