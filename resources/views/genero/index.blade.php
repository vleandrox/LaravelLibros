@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Laravel 7 CRUD Example </h2>
        </div>
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('genero.create') }}"> Create New Product</a>
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
                    <th scope="col">Genero</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genero as $generos)
                <tr>
                    <td>{{$generos->id}}</td>
                    <td>{{$generos->genero}}</td>
                    <td>{{$generos->descripcion}}</td>
                    <td>
                    <form action="{{ route('genero.destroy', $generos->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-info" href="{{ route('genero.show',$generos->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('genero.edit',$generos->id) }}">Edit</a>
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
