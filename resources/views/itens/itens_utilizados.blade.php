
@extends('layouts.main')

@section('title', 'Lista de Itens')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: black; font-weight: bold">Lista de Itens Utilizados</h1>
    <hr>
    <a href="{{ route('itens.gerenciar', $personagem->id) }}" class="btn mb-3" style="background-color: #547FBC; font-weight: bold; color: white;"><i class="fa fa-arrow-left"></i></a>
    <div class="row mt-5">
        @if (count($itens) == 0)
        <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-body" style="background-color: #fcf9f9;">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-center" style="color: black;">Nenhum item adicionado</h4>
                </div>
              </div>
            </div>
        </div>
        @endif
        @foreach ($itens as $item)
        <div class="col-md-4">
            <div class="card mb-3">
              <div class="card-body" style="background-color: #fcf9f9;">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-center" style="color: black;">{{$item->quantidade}} x {{ $item->item->name }}</h4>
                    <div class="text-center ml-auto">
                        <form action="{{ route('itens.show', $personagem->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="index" value="{{ $item->index }}">
                            <button type="submit" class="btn btn-sm" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-ellipsis"></i></button>
                        </form>
                        <form action="{{ route('itens.destroy', $personagem->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="index" value="{{ $item->item->index }}">
                            <button type="submit" class="btn btn-sm btn-danger" style="color: white; font-family: bold;"><i class="fa-solid fa-minus"></i></button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
