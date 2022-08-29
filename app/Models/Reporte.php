<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = "reporte";

    protected $fillable = [
        'tipo_incidente',
        'date_time',
        'descricao',
        'prioridade',
        'user_id',
        'latitude',
        'longitude',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
