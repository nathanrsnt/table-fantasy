
@extends('layouts.main')

@section('title', 'Lista de Magias')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: black; font-weight: bold">Lista de Magias</h1>
    <hr>
    <a href="{{ route('magias.gerenciar', $personagem->id) }}" class="btn mb-3" style="background-color:#547FBC; color: white; font-family: bold;"><i class="fa fa-arrow-left"></i></a>
    <div class="row mt-5">
        @foreach ($magias->results as $magia)
        <div class="col-md-4">
            <div class="card mb-3">
              <div class="card-body" style="background-color: #fcf9f9;">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-center" style="color: black;">{{ $magia->name }}</h4>
                    <div class="text-center ml-auto">
                        <form action="{{ route('magias.show', $personagem->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="index" value="{{ $magia->index }}">
                            <button type="submit" class="btn btn-sm" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-ellipsis"></i></button>
                        </form>
                        <form action="{{ route('magias.addMagia', $personagem->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="index" value="{{ $magia->index }}">
                            <input type="hidden" name="name" value="{{ $magia->name }}">
                            <button type="submit" class="btn btn-sm btn-primary" style=" color: white; font-family: bold;"><i class="fa-solid fa-plus"></i></button>
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
