<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Mensaje extends Model
{
    public $table = "mensaje";

    public function user()
    {
        return $this->belongsTo('App\User');        
    }
    
    protected $fillable = [
        'user_id',
        'titulo',
        'mensaje',
        'fecha',
    ];
}
