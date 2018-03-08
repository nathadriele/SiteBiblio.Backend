<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/* classe de role (cargo, função). cria e proteje o atributo name do role. */
class Role extends Model
{
    protected $fillable = [
        'name'
    ];
}
