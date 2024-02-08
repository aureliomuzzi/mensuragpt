<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    public $table = 'questoes';
    public $guarded = ['id', 'created_at', 'updated_at'];
   
    
}
