
@extends('layouts.main')

@section('title', 'Lista de Itens')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: black; font-weight: bold">Lista de Itens</h1>
    <hr>
    <a href="{{ route('itens.gerenciar', $personagem->id) }}" class="btn mb-3" style="background-color:#547FBC; color: white; font-family: bold;"><i class="fa fa-arrow-left"></i></a>
    <div class="row mt-5">
        @foreach ($itens->results as $item)
        <div class="col-md-4">
            <div class="card mb-3">
              <div class="card-body" style="background-color: #fcf9f9;">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-center" style="color: black;">{{ $item->name }}</h4>
                    <div class="text-center ml-auto">
                        <form action="{{ route('itens.addItem', $personagem->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="index" value="{{ $item->index }}">
                            <input type="hidden" name="name" value="{{ $item->name }}">
<!-- div estranha -->       <div class="d-flex align-items-center justify-content-center">
                            	<label for="quantidade" class="ml-2">Qtd.</label>
                            	<input class="form-control mt-2 m2-2" name="quantidade" type="number" value="0" min="1" max="99">
                                <button type="submit" class="btn btn-sm btn-primary ms-2" style=" color: white; font-family: bold;"><i class="fa-solid fa-plus"></i></button>
                        </form>
                        <form action="{{ route('itens.show', $personagem->id) }}" method="POST" class="ms-2">
                            @csrf
                            <input type="hidden" name="index" value="{{ $item->index }}">
                            <button type="submit" class="btn btn-sm" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-ellipsis"></i></button>
                        </form>
<!-- fim div estranha -->   </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
