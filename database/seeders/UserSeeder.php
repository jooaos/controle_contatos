<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'id' => 1,
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('teste')
        ];
        User::updateOrCreate(['id' => $user['id']], $user);
    }
}
