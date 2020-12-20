<?php

namespace Database\Factories;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FuncionarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcionario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => 1,
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'endereco' => $this->faker->address,
            'numero' => $this->faker->numberBetween(123, 9999),
            'bairro' => $this->faker->address,
            'cidade' => $this->faker->city,
            'estado' => 'SP',
        ];
    }
}
