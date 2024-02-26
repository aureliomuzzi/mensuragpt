<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatives extends Model
{
    use HasFactory;

    public $table = 'alternativas';
    public $guarded = ['id', 'created_at', 'updated_at'];
    
    public function questao()
    {
        return $this->belongsTo(Questions::class);
    }

    public static function questoes()
    {
        $questoes = Questions::get();
        return $questoes;
    }
}
