<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'voos';

=======
>>>>>>> 4080eb79e8e2f36266f7a68383f087ab626df785
    protected $fillable = [
        'numero_voo',
        'origem',
        'destino',
        'data_voo',
        'horario',
        'status',
    ];
<<<<<<< HEAD

    protected $guarded = ['id'];

    protected $casts = [
        'data_voo' => 'date',
        'horario' => 'datetime:H:i',
    ];
=======
>>>>>>> 4080eb79e8e2f36266f7a68383f087ab626df785
}
