<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public $table = "libro";

    public function user()
    {
        return $this->belongsTo('App\User');        
    }
    
    protected $fillable = [
        'titulo', 
        'genero',
        'año',
        'precio',
        'publicacion',        
        'user_id'
    ];
}
