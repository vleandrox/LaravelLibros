<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public $table = "genero";

    

    protected $fillable = [
        'id',
        'genero', 
        'descripcion',        
    ];
}
