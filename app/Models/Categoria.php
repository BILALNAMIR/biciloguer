<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nom', 'descripcio'];

    public function bicicletes()
    {
        return $this->belongsToMany(Bicicleta::class, 'bicicleta_categoria');
    }
}
