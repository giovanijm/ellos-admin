<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\TbStatus;

class TbStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TbStatus::create([
            'name'  =>  'Ativo',
            'description'   =>  'Clientes que estão ativos na plataforma'
        ]);

        TbStatus::create([
            'name'  =>  'Inativo',
            'description'   =>  'Clientes que estão inativos na plataforma'
        ]);
    }
}
