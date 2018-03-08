<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'is_active', 'password', 'foto_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /* método que aponta e retorna a classe role. */
    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function foto() {
        return $this->belongsTo('App\Foto');
    }

    /* método que escuta e compara o conteúdo dos atributos name e is_active, e rotorna, verdadeiro ou falso */
    public function isAdmin(){
        if($this->role->name  == "administrador" && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function frentes() {
        return $this->hasMany('App\Inicial');
    }
}
