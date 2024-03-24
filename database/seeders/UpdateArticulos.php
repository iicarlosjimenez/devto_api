<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateArticulos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articulos = Articulo::all();

        // Iterar sobre cada artículo
        $articulos->each(function ($articulo) {
            // Generar una fecha aleatoria entre hoy y menos 5 días
            $fechaAleatoria = Carbon::now()->subDays(random_int(0, 5));

            // Asignar la fecha aleatoria al artículo
            $articulo->created_at = $fechaAleatoria;

            // Guardar el artículo actualizado en la base de datos
            $articulo->save();
        });
    }
}
