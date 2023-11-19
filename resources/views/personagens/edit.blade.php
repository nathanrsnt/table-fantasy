@extends('layouts.main')

@section('title', 'Editar Personagem')

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
                    <h1 style="color: #547FBC; font-weight: bold;">Editar {{ $personagem->nome }}</h1>
                    <div class="col-lg-8 mx-auto">
                        <form action="{{ route('personagens.update', $personagem->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="nome">Nome do Personagem</label>
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Personagem" value="{{ $personagem->nome }}">
                            
                            <label for="classe">Classe</label>
                            <select class="form-control" type="text" name="classe" id="classe" placeholder="Classe do Personagem">
                                @foreach ($classes->results as $classe)
                                    <option value="{{ $classe->name }}">{{ $classe->name }}</option>
                                @endforeach
                            </select>

                            <label for="classe">Raça</label>
                            <select class="form-control" type="text" name="raca" id="raca" placeholder="Raça do Personagem">
                                @foreach ($races->results as $raca)
                                    <option value="{{ $raca->name }}">{{ $raca->name }}</option>
                                @endforeach
                            </select>

                            <label for="nivel">Nível</label>
                            <input class="form-control" type="number" name="nivel" id="nivel" placeholder="Nível do Personagem" value="{{ $personagem->nivel }}">

                            <label for="imagem">Imagem</label>
                            <input class="form-control" type="file" name="imagem" id="imagem">

                            <!-- Mostrar a imagem atual, se existir -->
                            @if ($personagem->imagem)
                                <img src="/img/personagens/{{ $personagem->imagem }}" alt="Imagem do Personagem" style="max-width: 200px; margin-top: 10px;" class="card-img">
                            @endif
                            
                            <button class="btn mt-3" type="submit" style="background-color: #547FBC; color: white;"><i class="fa-solid fa-check"></i></button>
                            <a href="{{ route('personagens.index') }}" class="btn mt-3"><i class="fa fa-arrow-left"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
