<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departament;

class DepartamentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create(['name'=>'Administrativo']);
        Departament::create(['name' => 'Contabilidade']);
        Departament::create(['name' => 'Balcão']);
        Departament::create(['name' => 'Limpeza']);
        Departament::create(['name' => 'Compras']);
        Departament::create(['name' => 'Desenvolvimento']);
        Departament::create(['name' => 'Segurança']);
    }
}
