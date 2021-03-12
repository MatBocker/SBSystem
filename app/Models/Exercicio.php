<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;
    protected $fillable = ['nome','peso','repeticoes','series'];

    public function treino()
    {
        return $this->belongsTo(treino::class);
    }
}
