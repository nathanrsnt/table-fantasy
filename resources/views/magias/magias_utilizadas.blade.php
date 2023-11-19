
@extends('layouts.main')

@section('title', 'Lista de Magias')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <h1 class="text-center" style="color: black; font-weight: bold">Lista de Magias Utilizadas</h1>
    <hr>
    <a href="{{ route('magias.gerenciar', $personagem->id) }}" class="btn mb-3" style="background-color: #547FBC; font-weight: bold; color: white;"><i class="fa fa-arrow-left"></i></a>
    <div class="row mt-5">
        @foreach ($magias as $magia)
        <div class="col-md-4">
            <div class="card mb-3">
              <div class="card-body" style="background-color: #fcf9f9;">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-center" style="color: black;">{{ $magia->magia->name }}</h4>
                    <div class="text-center ml-auto">
                        <a href="#" class="btn btn-sm" style="background-color: #547FBC; color: white; font-family: bold;"><i class="fa-solid fa-ellipsis"></i></a>
                        <form action="{{ route('magias.destroy', $personagem->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="index" value="{{ $magia->magia->index }}">
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
