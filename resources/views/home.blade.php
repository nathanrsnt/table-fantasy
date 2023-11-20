@extends('layouts.main')

@section('title', 'Table Fantasy')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: Black; font-weight: bold; color: #547FBC;">Feed de Atividades</h1>
    <hr>
    <div class="row mt-5">
        @foreach ($grupos as $grupo)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/grupos/{{$grupo->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h3 class="text-center mt-3" style="color: #547FBC;"><i class="fa-solid fa-user-group"></i> Grupo Criado</h3>
                <div class="card-body text-right">
                    <p class="card-text">Nome: {{$grupo->nome}}</p>
                    <p class="card-text">Criado por: {{$grupo->usuario->name}}</p>
                    <p class="card-text">Grupo criado em: {{$grupo->created_at}}</p>   
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($personagens as $personagem)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{$personagem->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h3 class="text-center mt-3" style="color: #547FBC;"><i class="fa-solid fa-person-burst"></i> Personagem Criado</h3>
                <div class="card-body text-right">
                    <p class="card-text">Nome: {{$personagem->nome}}</p>
                    <p class="card-text">Criado por: {{$personagem->usuario->name}}</p>
                    <p> Data: {{$personagem->created_at}} </p>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($personagemMagias as $personagemMagia)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="/img/personagens/{{$personagemMagia->personagem->imagem}}" class="card-img-top" width="300" height="400" alt="">
                <h3 class="text-center mt-3" style="color: #547FBC;"><i class="fa-solid fa-hat-wizard"></i> Magia Nova Adicionada</h3>
                <div class="card-body text-right">
                    <p class="card-text">Personagem: {{$personagemMagia->personagem->nome}}</p>
                    <p> Data: {{$personagemMagia->created_at}}</p>
                    <p class="card-text">Magia: {{$personagemMagia->magia_name}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
