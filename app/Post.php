<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'categoria_id',
        'foto_id',
        'title',
        'body'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function foto() {
        return $this->belongsTo('App\Foto');
    }

    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }
}
