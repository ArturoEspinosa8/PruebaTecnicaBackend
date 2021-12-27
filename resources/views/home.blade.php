@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Documentos') }}</div>

        <div class="card-body">
          @if ($rol == 1)
          <a class="btn btn-primary" href="{{ route('home.create') }}"> Crear Documento</a>
          @endif
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Titulo</th>
              <th>Descargar</th>
              @if ($rol == 1)
              <th>Editar</th>
              <th>Eliminar</th>
              @endif
            </thead>
            <tbody>
              @if($documentos->count())
              @foreach($documentos as $documento)
              <tr>
                <td>{{$documento->titulo}}</td>
                <td>
                  <a class="btn btn-primary btn-xs" href="{{route('downloadFile', $documento)}}" target="_blank">
                  <span class="glyphicon glyphicon-download"></span></a>
                </td>
                @if ($rol == 1)
                <td>
                  <a class="btn btn-primary btn-xs" href="{{ route('home.edit',$documento->id) }}" >
                  <span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                <td>
                  <form action="{{ route('home.destroy',$documento->id) }}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </td>
                  @endif
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="8">No hay Documentos!</td>
                </tr>
                @endif
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
