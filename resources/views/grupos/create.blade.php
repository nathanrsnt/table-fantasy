@extends('layouts.main')

@section('title', 'Novo Grupo')

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
            <h1 style="color: #547FBC; font-weight: bold;">Novo Grupo</h1>
            <div class="col-lg-8 mx-auto">
              <form action="{{ route('grupos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="nome">Nome do Grupo</label>
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Grupo">

                <label for="imagem">Imagem do Grupo</label>
                <input class="form-control" type="file" name="imagem" id="imagem" placeholder="Imagem do Grupo">
                
                <button class="btn mt-3" type="submit" style="background-color: #547FBC; color: white;"><i class="fa-solid fa-check"></i></button>
                <a href="{{ route('grupos.index') }}" class="btn mt-3"><i class="fa fa-arrow-left"></i></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
