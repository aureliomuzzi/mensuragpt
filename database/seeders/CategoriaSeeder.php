<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorias;

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
            'Medicina',
            'Biologia',
            'Matematica',
            'Filosofia',
            'Diversos'
        ];

        foreach ($categorias as $categoria) {
            Categorias::firstOrCreate([
                'categoria'=>$categoria,
            ]);
        }
    }
}
