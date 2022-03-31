<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Areas
        // P.R.O.M.E.B.A
        // Presidencia
        // Vocalia 1
        // Vocalia 2
        // Direccion de gestion administrativa
        // Direccion de relaciones institucionales
        // Direccion de secretaria general
        // Direccion de recursos humano
        // Direccion de informatica
        // Direccion de protocolo
        // Direccion de recupero de fondos
        // Direccion de recursos financieros
        // Direccion de control de gestion
        // Direccion de registro notarial
        // Gerencia de operativa
        // Gerencia de proyecto
        // Gerencia de desarrollo urbano
        // Gerencia socioeconomico
        // Archivo general
        // Archivo del interior
        // Archivo de resistencia
        // Archivo de financiera
        // Archivo de recursos humanos

        // Componentes con inventario opcional

        $entidad = new Area();
        $entidad->descripcion = 'Social';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
        
        $entidad = new Area();
        $entidad->descripcion = 'Legal';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }

        $entidad = new Area();
        $entidad->descripcion = 'Desarrollo Urbano';
        if(Area::where('descripcion', $entidad->nombre)->count() == 0 ){ $entidad->save(); }
    }
}
