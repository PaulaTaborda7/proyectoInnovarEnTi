<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'name' => 'admin',
            'documentoIdentidad' => '123456789',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '1',
        ]);
    }
}
