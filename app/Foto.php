<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $uploads = '/images/';
    protected $fillable = ['file'];

    public function getFileAttribute($foto) {
        return $this->uploads . $foto;
    }
}
