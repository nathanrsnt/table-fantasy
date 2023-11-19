@extends('layouts.main')

@section('title', 'Detalhes do Personagem')

@section('content')
@if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('msg') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <div class="cel d-flex justify-content-center text-center">
        <div class="card col-lg-9 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="/img/personagens/{{ $personagem->imagem }}" class="card-img" width="300" height="400" alt="{{ $personagem->nome }}">
                    </div>
                    <div class="col-lg-6 text-start">
                        <table>
                            <tr>
                                <th>Nome: </th>
                                <td>{{ $personagem->nome }}</td>
                            </tr>
                            <tr>
                                <th>Classe: </th>
                                <td>{{ $personagem->classe }}</td>
                            </tr>
                            <tr>
                                <th>Raça: </th>
                                <td>{{ $personagem->raca }}</td>
                            </tr>
                            <tr>
                                <th>Nível: </th>
                                <td>{{ $personagem->nivel }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-end">
                        @if(Auth::user()->id == $personagem->usuario)
                            <form action="{{ route('personagens.destroy', $personagem->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            <a class="button btn" style="background-color: #547FBC; color: white" href="{{ route('personagens.edit', $personagem->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endif
                        <a class="button btn" href="{{ route('personagens.index') }}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
