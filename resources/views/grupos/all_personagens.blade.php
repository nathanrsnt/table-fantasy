@extends('layouts.main')

@section('title', 'Personagens do Grupo')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: #547FBC; font-weight: bold">Personagens no Grupo</h1>
    <hr>
    @if ($grupo->usuario == auth()->user()->id)
    <a href="{{ route('grupos.personagens', $grupo->id) }}" class="btn" style="font-family: bold; background-color: #547FBC; color: white;"><i class="fa fa-plus"></i></a>
    @endif
    <a href="{{ route('grupos.gerenciar', $grupo->id) }}" class="btn" style="font-family: bold; background-color: #547FBC; color: white;"><i class="fa fa-arrow-left"></i></a>
    
    <div class="row mt-5">
        @if (count($personagens) == 0)
            <h2 class="text-center">Ainda Não há personagens no grupo</h2>
        @endif
        @foreach ($personagens as $personagem)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{ $personagem->imagem }}" class="card-img-top" width="300" height="400" alt="{{ $personagem->nome }}">
                <h2 class="text-center" style="color: #547FBC;">{{ $personagem->nome }}</h2>
                <div class="card-body">
                    <p class="card-text">Classe: {{ $personagem->classe }}</p>
                    <p class="card-text">Raça: {{ $personagem->raca }}</p>
                    <p class="card-text">Nível: {{ $personagem->nivel }}</p>
                    @if ($grupo->usuario == auth()->user()->id)
                        <div class="text-center">
                            <form action="{{ route('grupos.deletePersonagem', $personagem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="font-family: bold;"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    @endif

                    @if ($personagem->usuario == auth()->user()->id && $grupo->usuario != auth()->user()->id)
                        <div class="text-center">
                            <form action="{{ route('grupos.deletePersonagem', $personagem->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color: red; color: white; font-family: bold;"><i class="fa-solid fa-door-open"></i></button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
