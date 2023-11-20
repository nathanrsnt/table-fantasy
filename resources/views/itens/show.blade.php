@extends('layouts.main')

@section('title', 'Detalhes do Item')

@section('content')
@if (session('msg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('msg') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="container">
  <div class="cel d-flex justify-content-center text-center">
    <div class="card col-lg-9 mt-3 text-center">
      <div class="card-body">
        <div class="row text-start">
          
            <table class="table table-striped">
              <tr>
                <th>Nome: </th>
                <td>{{ $item->name }}</td>
              </tr>
              <tr>
                <th>Categoria de Equipamento: </th>
                <td>{{ $item->equipment_category->name }}</td>
              </tr>
              <tr>
                <th>Categoria de Equipamento: </th>
                <td>{{ $item->gear_category->name }}</td>
              </tr>
              <tr>
                <th>Custo: </th>
                <td>{{ $item->cost->quantity }} {{ $item->cost->unit }}</td>
              </tr>
              <tr>
                <th>Peso: </th>
                <td>{{ $item->weight }}</td>
              </tr>
              <tr>
                <th>Conteúdo: </th>
                <td>
                  @foreach ($item->contents as $content)
                    <p>{{ $content }}</p>
                  @endforeach
                </td>
              </tr>
              <tr>
                <th>Propriedades: </th>
                <td>
                  @foreach ($item->properties as $property)
                    <p>{{ $property }}</p>
                  @endforeach
                </td>
              </tr>
            </table>
          
          <div class="text-end">
            <a class="button btn" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection