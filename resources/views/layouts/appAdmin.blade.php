<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INNOVAR EN TI') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" style="background-color: #EDEEF0">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-image:url('https://img.freepik.com/vector-gratis/fondo-azul-galaxia_125540-99.jpg?w=740&t=st=1665358237~exp=1665358837~hmac=69926ce80c13a787b9e9bdfc19c4f5241500b8e481d945e2844e9751d5ff3c8c')">
            <div class="container">
                <!--las imágenes van en la carpeta public-->
                <img src="{!! asset('images/logo.png') !!}" style="width: 200px; height: 110px">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href=" # ">
                                <h3 class="display-4 text-white" style="background: -webkit-linear-gradient(left, #03D9EF, #0081B9, #0154A1)">INNOVAR EN TI</h3>
                            </a>
                        </li>
                        @if (Session::has('LoggedAdmin'))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre class="text-white">
                                {{ Session::get('nombreAdmin')  }}
                                {{-- {{ Auth::user()->name }} --}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="bg-light text-center text-lg-start mt-5">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-center fw-bold fs-4">Acerca de INNOVAR EN TI</h5>
                        <p>
                        INNOVAR EN TI es un emprendimiento de una empresa que se creó con el objetivo de
                        brindar Recursos Educativos Digitales como herramientas para hacer que las clases de los estudiantes en los 
                        colegios sean mucho más dinámicas y de calidad.
                        </p>
                    </div>
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-center fw-bold fs-4">Sobre los Recursos Educativos Digitales</h5>
                        <p>
                        INNOVAR EN TI ofrece los recursos educativos para los grados primero, segundo y tercero de los colegios públicos 
                        y privados, en primera instancia, del país, después a nivel internacional.
                        </p>
                    </div>
                </div>
                <!--Grid row-->
            </div>
            <div class="d-flex justify-content-center">
                <section class="mb-1">
                    <!-- Facebook -->
                    <i class="bi bi-facebook"></i>

                    <!-- Twitter -->
                    <i class="bi bi-twitter"></i>

                    <!-- Google -->
                    <i class="bi bi-google"></i>

                    <!-- Instagram -->
                    <i class="bi bi-instagram"></i>
                </section>
            </div>
            <!-- Copyright -->
            <div class="text-center p-3 text-light bg-primary bg-opacity-75" style="background-image:url('https://besthqwallpapers.com/Uploads/10-11-2019/110694/thumb2-blue-stone-background-stone-texture-grunge-blue-background-creative-blue-texture.jpg')">
                Paula Andrea Taborda Montes
                <br>
                Laura Quintero Cuartas
                <br>
                Nicolás Giraldo Gil 
            </div>
        </footer>
    </div>
</body>

</html>