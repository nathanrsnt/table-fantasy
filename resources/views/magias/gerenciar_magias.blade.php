@extends('layouts.main')

@section('title', 'Gerenciar Magias')

@section('content')

@if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
@endif

<div class="container text-center">
  <h1 class="text-center" style="color: #FFD700; font-weight: bold">Gerenciar Magias</h1>
  <a href="{{ route('personagens.index') }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;"><i class="fa fa-arrow-left"></i> Voltar</a>
  <div class="row mt-5 justify-content-center">
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/magias.jpeg" class="card-img-top" width="300" height="400" alt="Ver Magias">
        <h2 class="text-center" style="color: #FFD700;">Todas as Magias</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('magias.index', $personagem->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;"><i class="fa fa-eye"></i> Ver Magias</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/magias.jpg" class="card-img-top" width="300" height="400" alt="Adicionar Magia">
        <h2 class="text-center" style="color: #FFD700;">Magias Utilizadas</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('magias.utilizadas', $personagem->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;"><i class="fa fa-eye"></i> Ver Magia</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
