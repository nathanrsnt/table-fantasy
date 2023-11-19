@extends('layouts.main')

@section('title', 'Table Fantasy')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: Black; font-weight: bold">Feed de Atividades</h1>
    <div class="row mt-2">
        <hr>
        @foreach ($grupos as $grupo)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/grupos/{{$grupo->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h2 class="text-center" style="color: #FFD700;">{{$grupo->nome}}</h2>
                <div class="card-body text-center">
                    <p class="card-text">Grupo criado em: {{$grupo->created_at}}</p>
                    <div class="text-center">
                        <form action="">
                            <a href="" class="btn" style="background-color: #FFD700; color: white; font-weight: bold;"><i class="fa-solid fa-eye"></i> Mais detalhes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($personagens as $personagem)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{$personagem->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h2 class="text-center" style="color: #FFD700;">Personagem criado</h2>
                <div class="card-body text-center">
                    <p class="card-text">Nome: {{$personagem->nome}}</p>
                    <p> Data: {{$personagem->created_at}} </p>
                    <p class="card-text">Classe: {{$personagem->classe}}</p>
                    <div class="text-center">
                        <form action="">
                            <a href="" class="btn" style="background-color: #FFD700; color: white; font-weight: bold;"><i class="fa-solid fa-eye"></i> Mais detalhes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($personagemMagias as $personagemMagia)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{$personagemMagia->personagem->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h2 class="text-center" style="color: #FFD700;"> Magia nova adicionada</h2>
                <div class="card-body text-center">
                    <p class="card-text">Personagem: {{$personagemMagia->personagem->nome}}</p>
                    <p> {{$personagemMagia->created_at}}</p>
                    <p class="card-text">Magia: {{$personagemMagia->magia_name}}</p>
                    <div class="text-center">
                        <form action="">
                            <a href="" class="btn" style="background-color: #FFD700; color: white; font-weight: bold;"><i class="fa-solid fa-eye"></i> Mais detalhes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
