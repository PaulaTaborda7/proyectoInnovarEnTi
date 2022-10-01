<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Institucion;
use App\Models\Materia;
use App\Models\Red;
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
            'password_confirmation' => Hash::make('admin'),
            'tipo' => '1',
        ]);


        $adminInsttucion = Institucion::create([
            'insNombre' => 'Institucion Admin',
            'codigoNit' => '111',
            'insDireccion' => 'cra',
            'insDepartamento' => 'Caldas',
            'insPais' => 'Colombia',
            'insTelefono' => '8501497',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '10',
            'insCantidadEstudiantes' => '100',
            'tipoPaquete' => '1',
        ]);

        $userGrupo = Grupo::create([
            'gruNombre' => 'GrupoAdmin',
            'gruIdGrupo' => '112',
            'gruJornada' => 'Mañana',
            'gruCantEstudiante' => '15',
            'gruCantMateria' => '10',
            'insCodigoNit' => '111',
        ]);

        $userDocente = Docente::create([
            'nombre' => 'DocenteAdmin',
            'documentoIdentidad' => '987654321',
            'email' => 'doc@gmail.com',
            'docTipoContrato' => '1',
            'docAreaCurricular' => '2',
            'insCodigoNit' => '111',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);

        $userEstudiante = Estudiante::create([
            'nombre' => 'EstudianteAdmin',
            'numIdentidad' => '12345678',
            'email' => 'estu@gmail.com',
            'tipo' => '3',
            'estPromedio' => '4',
            'insCodigoNit' => '111',
            'numIdentidadPadre' => '11',
            'gruIdCurso' => '112',
            'observacion' => 'Hola',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
        ]);

        //Seeder para temática
        $tematica1 = Materia::create([
            'matIdMateria' => '4321',
            'matNombreMateria' => 'Inglés',
            'matDescripcion' => 'what is your name?',
        ]);

        //Seeders para recursos
        $admRed = Red::create([
            'redNombre' => 'DIAMANTE',
            'redIdRed' => '3',
            'redDescripcion' => 'Para aprender',
            'redTipoRecurso' => '1',
            'idMateria' => '4321',
        ]);
        $admRed2 = Red::create([
            'redNombre' => 'Imagen UNAL',
            'redIdRed' => '4',
            'redDescripcion' => 'Una imagen de la UNAL',
            'redTipoRecurso' => '0',
            'idMateria' => '4321',
        ]);
    }
}
