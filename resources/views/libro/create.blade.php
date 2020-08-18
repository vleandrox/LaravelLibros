@extends('layouts.app')
  
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-2">
        </div>
        <div class="card col-8">
        </br>
        <div class="">
            <h2>.: Crear Nuevo Libro :.  </h2>
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
        <form action="{{ route('libro.store') }}" method="POST">
        @csrf
            <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control"  name="titulo" placeholder="Ingrese titulo">
            </div>
            <div class="form-group">
            <label for="genero">Genero : </label>
            <input type="text" class="form-control" name="genero" placeholder="Ingrese genero">
            </div>
            <div class="form-group">
            <label for="publicacion">Publicacion : </label>
            <input type="text" class="form-control" name="publicacion" placeholder="Ingrese año publiacion">
            </div>
            <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" placeholder="Ingrese precio">
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