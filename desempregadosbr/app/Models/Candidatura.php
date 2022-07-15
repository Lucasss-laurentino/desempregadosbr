<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaga_id',
        'user_id',
    ];

    public function vagas() {
        return $this->hasMany(Vaga::class);
    }
    public function candidato() {
        return $this->hasMany(User::class);
    }
}
