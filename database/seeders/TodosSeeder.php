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
        $useradmin=User::create([
            'name' => 'admin paul',
            'documentoIdentidad' => '123456789',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '1',
            ]);
                    
        $user1=User::create([
            'name' => 'usuario docente',
            'documentoIdentidad' => '1002938765',
            'email' => 'user@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '2',
            ]);
        $user1=User::create([
            'name' => 'usuario estudiante',
            'documentoIdentidad' => '1002938766',
            'email' => 'estudiante@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '3',
            ]);
        $user1=User::create([
            'name' => 'usuario padre de familia',
            'documentoIdentidad' => '1002938767',
            'email' => 'padre@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '4',
            ]);
    }
}
