@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>Editar Documento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home.index') }}"> Volver</a>
        </div>
    </div>
</div>


<form action="{{ route('home.update',$documento->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    {{ method_field('PUT') }}

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
              {{$documento->titulo}}
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
          <select class="form-control select2" style="width: 100%;" name="users_id">
            <option value="users_id" selected>Seleccionar Usuario/a</option>

            @foreach($users as $user)
                  @if ($user->id == $documento->id_user)
                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                  @else
                    <option value="{{$user->id}}">{{$user->name}}</option>
                  @endif
            @endforeach

          </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar Cambio</button>
        </div>
    </div>

</form>
@endsection
