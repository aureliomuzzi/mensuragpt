<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    public $table = 'questoes';
    public $guarded = ['id', 'created_at', 'updated_at'];
   
    public static function questoes()
    {
        $enunciado = Questao::get()->pluck('enunciado', 'id');
        return $enunciado;
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public static function categorias()
    {
        $categorias = Categoria::get()->pluck('categoria', 'id');
        return $categorias;
    }

}
