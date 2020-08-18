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
        <form action="{{ route('libro.update',$libro->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
            <label for="titulo"> <strong>Titulo : </strong></label>
            <input type="text" class="form-control"  name="titulo" value="{{$libro->titulo}}" >
            </div>
            <div class="form-group">
            <label for="genero"> <strong>Genero : </strong></label>
            <input type="text" class="form-control" name="genero" value="{{$libro->genero}}">
            </div>
            <div class="form-group">
            <label for="publicacion"> <strong>Publicacion : </strong></label>
            <input type="text" class="form-control" name="publicacion" value="{{$libro->publicacion}}">
            </div>
            <div class="form-group">
            <label for="precio"> <strong>Precio : </strong></label>
            <input type="text" class="form-control" name="precio" value="{{$libro->precio}}">
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