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

        //Seeders de Instituciones
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
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Nicolás',
            'codigoNit' => '112',
            'insDireccion' => 'Cra 78 # 09-80',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '850177',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '10',
            'insCantidadEstudiantes' => '100',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio Juanito',
            'codigoNit' => '113',
            'insDireccion' => 'Cra 95 # 46-12',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '798542897',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '10',
            'insCantidadEstudiantes' => '1000',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio León de Judá',
            'codigoNit' => '114',
            'insDireccion' => 'Cra 67 # 95-81',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '8796544310',
            'insCalendario' => 'B',
            'insCantidadDocentes' => '9',
            'insCantidadEstudiantes' => '167',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San José',
            'codigoNit' => '115',
            'insDireccion' => 'Cra 41 # 08-19',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '879644331',
            'insCalendario' => 'B',
            'insCantidadDocentes' => '76',
            'insCantidadEstudiantes' => '1678',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Manuel',
            'codigoNit' => '116',
            'insDireccion' => 'Cra 19 # 90-45',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '5775331',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '10',
            'insCantidadEstudiantes' => '180',
            'tipoPaquete' => '0',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Juan',
            'codigoNit' => '117',
            'insDireccion' => 'Cra 90 # 90-544',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '96437031',
            'insCalendario' => 'B',
            'insCantidadDocentes' => '67',
            'insCantidadEstudiantes' => '754',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Pedro',
            'codigoNit' => '118',
            'insDireccion' => 'Cra 345 # 907-804',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '88976541',
            'insCalendario' => 'B',
            'insCantidadDocentes' => '348',
            'insCantidadEstudiantes' => '7524',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Pablo',
            'codigoNit' => '119',
            'insDireccion' => 'Cra 350 # 97-814',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '84132610',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '824',
            'insCantidadEstudiantes' => '8765',
            'tipoPaquete' => '1',
        ]);
        $adminInsttucion = Institucion::create([
            'insNombre' => 'Colegio San Francisco',
            'codigoNit' => '120',
            'insDireccion' => 'Cra 2 # 09-814',
            'insPais' => '47',
            'insDepartamento' => '782',
            'insCiudad' => '532',
            'insTelefono' => '862610',
            'insCalendario' => 'A',
            'insCantidadDocentes' => '87',
            'insCantidadEstudiantes' => '876',
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

        //Seeders de Docentes
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
        $userDocente = Docente::create([
            'nombre' => 'Jairo López',
            'documentoIdentidad' => '15892192',
            'email' => 'jairol@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Lenguas',
            'insCodigoNit' => '112',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Dora Liliana Pérez',
            'documentoIdentidad' => '30346589',
            'email' => 'Dliliana@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Español',
            'insCodigoNit' => '114',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Alberto Gómez',
            'documentoIdentidad' => '987954321',
            'email' => 'alberto@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Sociales',
            'insCodigoNit' => '112',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Carlos Gil',
            'documentoIdentidad' => '32398452',
            'email' => 'cargil@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Informática',
            'insCodigoNit' => '114',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]); 
        $userDocente = Docente::create([
            'nombre' => 'Esteban Valbuena ',
            'documentoIdentidad' => '15766567',
            'email' => 'valbuena@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Matemáticas',
            'insCodigoNit' => '111',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Alberta Gómez',
            'documentoIdentidad' => '9876548441',
            'email' => 'alberto@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Sociales',
            'insCodigoNit' => '114',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Mónica Villa',
            'documentoIdentidad' => '30358835',
            'email' => 'monicaV@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Lectura',
            'insCodigoNit' => '112',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Helmer Montes', 
            'documentoIdentidad' => '16790823',
            'email' => 'monteshelmes@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Ciencias Naturales',
            'insCodigoNit' => '114',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);
        $userDocente = Docente::create([
            'nombre' => 'Olga Marín',
            'documentoIdentidad' => '13567290',
            'email' => 'olga@gmail.com',
            'docTipoContrato' => 'De planta',
            'docAreaCurricular' => 'Ciencias Naturales',
            'insCodigoNit' => '112',
            'idGrupo' => '112',
            'password' => Hash::make('12345678'),
            'password_confirmation' => Hash::make('12345678'),
            'tipo' => '2',
        ]);

        //Seeders de estudiantes
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
            'imagen' => 'imagen.jpg',
        ]);
        $admRed2 = Red::create([
            'redNombre' => 'Imagen UNAL',
            'redIdRed' => '4',
            'redDescripcion' => 'Una imagen de la UNAL',
            'redTipoRecurso' => '0',
            'idMateria' => '4321',
            'imagen' => 'imagen.jpg',
        ]);
    }
}
