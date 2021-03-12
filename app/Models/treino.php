<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class treino extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function aluno()
    {
        return $this->hasOne(Aluno::class);    
    }

    public function exercicio()
    {
        return $this->hasMany(Exercicio::Class);
    }
}
