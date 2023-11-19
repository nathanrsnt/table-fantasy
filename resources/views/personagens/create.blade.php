@extends('layouts.main')

@section('title', 'Novo Personagem')

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
                        <h1 style="color: #547FBC; font-weight: bold;">Novo Personagem</h1>
                        <div class="col-lg-8 mx-auto">
                            <form action="{{ route('personagens.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="nome">Nome do Personagem</label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Personagem">
                                
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
                                <input class="form-control" type="number" name="nivel" id="nivel" placeholder="Nível do Personagem">

                                <label for="imagem">Imagem</label>
                                <input class="form-control" type="file" name="imagem" id="imagem" placeholder="Imagem do Personagem">
                                
                                <button class="btn mt-3" type="submit" style="background-color: #547FBC; color: white;">Salvar</button>
                                <a href="{{ route('personagens.index') }}" class="btn mt-3">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
