<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    protected $fillable = ['nom', 'descripcio', 'preu_dia', 'disponible', 'imatge'];

    public function categories()
    {
        return $this->belongsToMany(Categoria::class, 'bicicleta_categoria');
    }

    public function lloguers()
    {
        return $this->hasMany(Lloguer::class);
    }
}
