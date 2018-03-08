<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inicial extends Model
{
    protected $fillable = [
        'email', 
        'telefone', 
        'foto_id'
    ];

    public function foto() {
        return $this->belongsTo('App\Foto');
    }
}
