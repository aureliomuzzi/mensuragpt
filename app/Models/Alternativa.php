<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    use HasFactory;

    public $table = 'alternativas';
    public $guarded = ['id', 'created_at', 'updated_at'];
    
    public function questao()
    {
        return $this->belongsTo(Questao::class);
    }

    public function questoes()
    {
        $questoes = Questao::get()->pluck('enunciado', 'id');
        return $questoes;
    }
}
