<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'titulo', 
        'texto', 
        'foto_id'
    ];

    public function foto() {
        return $this->belongsTo('App\Foto');
    }
}
