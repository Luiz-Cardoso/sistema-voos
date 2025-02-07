<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

    protected $table = 'voos';

    protected $fillable = [
        'numero_voo',
        'origem',
        'destino',
        'data_voo',
        'horario',
        'status',
    ];
    protected $guarded = ['id'];

    protected $casts = [
        'data_voo' => 'date',
        'horario' => 'string',
    ];

}
