@extends('layouts.main')

@section('title', 'Personagens do Grupo')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: #FFD700; font-weight: bold">Personagens no Grupo</h1>
    <div class="row mt-5">
        @foreach ($personagens as $personagem)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{ $personagem->imagem }}" class="card-img-top" width="300" height="400" alt="{{ $personagem->nome }}">
                <h2 class="text-center" style="color: #FFD700;">{{ $personagem->nome }}</h2>
                <div class="card-body">
                    <p class="card-text">Classe: {{ $personagem->classe }}</p>
                    <p class="card-text">Raça: {{ $personagem->raca }}</p>
                    <p class="card-text">Nível: {{ $personagem->nivel }}</p>
                    <div class="text-center">
                        <form action="{{ route('grupos.deletePersonagem', $personagem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="font-family: bold;">Remover da Party</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
