<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$/swey/zg7YyhTcodc3xfbuipFzfE8Og1ENRC4Niy3KblNaMoX/7Ue', // admin123
            'admin' => 1,
        ]);

        User::factory()
            ->times(10)
            ->create();
    }
}
