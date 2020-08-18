@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Laravel 7 CRUD Example</h2>
        </div>
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('autor.create') }}"> Agregar Nuevo Autor</a>
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
                    <th scope="col">Nombes</th>
                    <th scope="col">Apellidos</th>                    
                    <th scope="col">Pais</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autor as $autors)
                <tr>
                    <td>{{$autors->id}}</td>
                    <td>{{$autors->nombres}}</td>
                    <td>{{$autors->apellidos}}</td>
                    <td>{{$autors->edad}}</td>
                    <td>{{$autors->pais}}</td>
                    <td>
                    <form action="{{ route('autor.destroy', $autors->id) }}" method="POST">
                         @csrf
                        @method('delete')
                        <a class="btn btn-info" href="{{ route('autor.show',$autors->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('autor.edit',$autors->id) }}">Edit</a>
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
