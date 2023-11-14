@extends('layouts.main')

@section('title', 'Lista de Grupos')

@section('content')

@if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
@endif

<div class="container">
  <h1 class="text-center" style="color: #FFD700; font-weight: bold">Meus Grupos</h1>
  <div class="row mt-5">
    @foreach ($grupos as $grupo)
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/grupos/{{ $grupo->imagem }}" class="card-img-top" width="300" height="400" alt="{{ $grupo->nome }}">
        <h2 class="text-center" style="color: #FFD700;">{{ $grupo->nome }}</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.gerenciar', $grupo->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;">Gerenciar Participantes</a>
            <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;">Editar</a>
            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background-color: red; color: white; font-family: bold;"><i class="fa-solid fa-trash-can"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-md-4">
      <div class="card mb-3">
        <img src="/img/grupo.jpg" class="card-img-top" width="300" height="400" alt="Novo Grupo">
        <h2 class="text-center" style="color: #FFD700;">Novo Grupo</h2>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('grupos.create') }}" class="btn" style="background-color: #FFD700; color: white; font-family: bold;"><i class="fa fa-plus"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
