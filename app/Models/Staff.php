<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'socios';
    protected $primaryKey = 'codigo';

    public function vehiculos(){
        return $this->belongsTo(Vehiculo::class, 'cod_socio');
    }
}
