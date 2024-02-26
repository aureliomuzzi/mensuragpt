<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    public $table = 'questoes';
    public $guarded = ['id', 'created_at', 'updated_at'];
   
    public static function questoes()
    {
        $enunciado = Questions::all();
        return $enunciado;
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    public static function categorias()
    {
        $categorias = Categorias::get()->pluck('categoria', 'id');
        return $categorias;
    }

}
