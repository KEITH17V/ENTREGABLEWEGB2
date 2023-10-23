<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Agregar Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title></title>

    <style>
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(300deg, #eeffff 0, #bdf2ff 25%, #84ccef 50%, #42a7d4 75%, #0087bd 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }

        .centered-box {

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100%;

        }

        footer {

            background-color: rgba(255, 255, 255, 0.5);

            padding: 20px;

            text-align: center;

            position: fixed;

            bottom: 0;

            width: 100%;

        }

    </style>

</head>

<body>

    <header class="bg-dark text-light p-3">

        <div class="container">

            @if(session('usuario_autenticado'))

                <div class="centered-box">

                    {{-- Capturamos el usuario de la sesion --}}

                    <p>Bienvenido: {{ session('usuario_autenticado')['usuario'] }}</p>

                </div>

            @endif

        </div>

    </header>

    <div class="container mt-4">

        @yield('principal')    

        @yield('content')

    </div>

 

    <footer>

        <p class="text-dark">Todos los derechos reservados para JhonnyTec</p>

    </footer>

 

    <!-- Agregar Bootstrap y jQuery al final del documento -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>