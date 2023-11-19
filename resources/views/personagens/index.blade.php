@extends('layouts.main')

@section('title', 'Lista de Personagens')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: #547FBC; font-weight: bold">Meus Personagens</h1>
    <hr>
    <div class="row mt-5">
        @foreach ($personagens as $personagem)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{ $personagem->imagem }}" class="card-img-top" width="300" height="400" alt="{{ $personagem->nome }}">
                <h2 class="text-center" style="color: #547FBC;">{{ $personagem->nome }}</h2>
                <div class="card-body">
                    <p class="card-text">Classe: {{ $personagem->classe }}</p>
                    <p class="card-text">Raça: {{ $personagem->raca }}</p>
                    <p class="card-text">Nível: {{ $personagem->nivel }}</p>
                    <div class="text-center">
                        <a href="{{ route('personagens.show', $personagem->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-ellipsis"></i></a>
                        <a href="{{ route('personagens.edit', $personagem->id) }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-sack-dollar"></i></a>
                        <a href="{{ route('magias.gerenciar', $personagem->id)}}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-wand-sparkles"></i></a>
                        <form action="{{ route('personagens.destroy', $personagem->id) }}" method="POST" class="d-inline-block">
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
                <img src="/img/personagem.jpg" class="card-img-top" width="300" height="400" alt="Novo Personagem">
                <h2 class="text-center" style="color: #547FBC;">Novo Personagem</h2>
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('personagens.create') }}" class="btn" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa fa-plus"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
