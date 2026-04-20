<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lloguer extends Model
{
    protected $fillable = ['user_id', 'bicicleta_id', 'data_inici', 'data_fi', 'preu_total'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function bicicleta() {
        return $this->belongsTo(Bicicleta::class);
    }
}
