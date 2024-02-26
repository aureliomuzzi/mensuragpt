<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Informatica',
            'Eletronica',
            'Saude',
            'Direito',
            'Fisica',
            'Quimica',
            'Telecomunicacoes',
            'Biologia',
            'Matematica',
            'Filosofia',
            'Diversos'
        ];

        foreach ($categorias as $categoria) {
            Categoria::firstOrCreate([
                'categoria'=>$categoria,
            ]);
        }
    }
}
