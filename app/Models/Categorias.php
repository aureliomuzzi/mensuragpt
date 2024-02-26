<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public $table = 'categorias';
    public $guarded = ['id', 'created_at', 'updated_at'];

    public static function categorias()
    {
        $categoria = Categorias::all();
        return $categoria;
    }
}
