@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Laravel 7 CRUD Example </h2>
        </div>
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('roleuser.create') }}"> Agregar Nuevo Permiso</a>
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
                    <th scope="col">Usuario</th>
                    <th scope="col">Permiso</th>                                        
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roleuser as $roleusers)
                <tr>
                    <td>{{$roleusers->id}}</td>   
                    <td>{{$roleusers->user->name}}</td>                                    
                    <td>{{$roleusers->role->nombre}}</>
                    
                    <td>
                    <form action="" method="POST">
                         
                        <a class="btn btn-info" href="">Show</a>
                        <a class="btn btn-primary" href="{{ route('roleuser.edit',$roleusers->id) }}">Edit</a>
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


