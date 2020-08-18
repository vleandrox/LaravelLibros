@extends('layouts.app')
  
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Crear Nuevo Genero :.  </h2>
        </div>
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form action="{{ route('genero.store') }}" method="POST">
        @csrf
            <div class="form-group">
            <label for="genero">Genero</label>
            <input type="text" class="form-control" name="genero" id="genero" placeholder="Ingrese nombre genero">
            </div>
            <div class="form-group">
            <label for="descripcion">descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese descripcion">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>           
        </br>
        </div>
    </div>
</div>


@endsection