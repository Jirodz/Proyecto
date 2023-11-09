<?php

use Illuminate\Database\Seeder;
use App\Models\Port;

// database/seeders/PuertosTableSeeder.php
class PuertosTableSeeder extends Seeder
{
    public function run()
    {
        // Genera una lista de números del 1 al 48
        $puertos = range(1, 48);

        // Itera sobre la lista y crea un registro para cada número
        foreach ($puertos as $numeroPuerto) {
            Port::create([
                'numero_puerto' => $numeroPuerto,
            ]);
        }
    }
}




