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
            'insPais' => 'Colombia',
            'insDepartamento' => 'Caldas',
            'insCiudad' => 'Manizales',
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

        //Seeders para temática
        $tematica1 = Materia::create([
            'matIdMateria' => '4321',
            'matNombreMateria' => 'Inglés',
            'matDescripcion' => 'La temática Inglés tiene por propósito desarrollar las competencias lingüísticas y 
            sociolingüísticas de los alumnos con un enfoque que estimula la interacción en la lengua desde el primer momento.',
        ]);
        $tematica2 = Materia::create([
            'matIdMateria' => '1234',
            'matNombreMateria' => 'Matemáticas',
            'matDescripcion' => 'Mediante el aprendizaje de las matemáticas los estudiantes desarrollan y enriquecen su capacidad 
            de pensamiento, de reflexión lógica, desarrollo científico e interpretativo.',
        ]);
        $tematica3 = Materia::create([
            'matIdMateria' => '5678',
            'matNombreMateria' => 'Ciencias Naturales',
            'matDescripcion' => 'La asignatura de Ciencias Naturales permite despertar en el estudiante el asombro por conocer 
            el mundo que lo rodea, comprenderlo y utilizar metodologías para estudiarlo.',
        ]);
        $tematica4 = Materia::create([
            'matIdMateria' => '9876',
            'matNombreMateria' => 'Ciencias Sociales',
            'matDescripcion' => 'Se concibe como una ciencia que nos brinda las herramientas necesarias para aprender a leer e 
            interpretar la realidad social.',
        ]);
        $tematica5 = Materia::create([
            'matIdMateria' => '1357',
            'matNombreMateria' => 'Educación Física',
            'matDescripcion' => 'La asignatura de Educación Física tiene como propósito desarrollar en los estudiantes habilidades 
            y destrezas motrices, así como actitudes y valores que les permitan vivir una vida saludable.',
        ]);
        $tematica6 = Materia::create([
            'matIdMateria' => '8642',
            'matNombreMateria' => 'Educación Artística',
            'matDescripcion' => 'La asignatura de Educación Artística tiene como propósito desarrollar en los estudiantes habilidades
            y destrezas artísticas.',
        ]);
        $tematica7 = Materia::create([
            'matIdMateria' => '8524',
            'matNombreMateria' => 'Tecnología e Informática',
            'matDescripcion' => 'El área de tecnología e informática abarca las competencias de conocimiento tecnológico, 
            comunicacional, ético y laboral que le permiten al educando ubicarse en un medio en continua transformación.',
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
