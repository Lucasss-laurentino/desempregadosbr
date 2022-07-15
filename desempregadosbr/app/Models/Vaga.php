<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'titulo',
        'cargo',
        'estado',
        'cidade',
        'salario',
        'quantidade',
        'descricao',
    ];

    public function candidatura() {
        return $this->belongsTo(Candidatura::class);
    }
}
