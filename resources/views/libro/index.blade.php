@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Laravel 7 CRUD Example </h2>
        </div>
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('libro.create') }}"> Agregar Nuevo Libro</a>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-12">
       
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        
   
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Genero</th>                                        
                    <th scope="col">Publicacion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">User</th>   
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libro as $libros)
                <tr>
                    <td>{{$libros->id}}</td>
                    <td>{{$libros->titulo}}</td>
                    <td>{{$libros->genero}}</td>
                    <td>{{$libros->publicacion}}</td>
                    <td>{{$libros->precio}}</td>    
                    <td>{{$libros->user->name}}</td>    
                    <td>
                    <form action="" method="POST">
                         
                        <a class="btn btn-info" href="">Show</a>
                        <a class="btn btn-primary" href="{{ route('libro.edit',$libros->id) }}">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

