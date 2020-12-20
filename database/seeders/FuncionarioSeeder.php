<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while ($i <= 20):
            Funcionario::factory()
                ->create([
                    'empresa_id' => rand(1, 20)
                ]);
            $i++;
        endwhile;
    }
}
