
@extends('layout')    

@section('content')

<!DOCTYPE html>

<html lang="en">

 

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Principal</title>

    <!-- Agrega la referencia a Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

        body {

            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

            background-image: url('https://www.creativosonline.org/wp-content/uploads/2014/07/fondos_naturales_447-1920x1080.jpg');

            background-size: cover;

            background-repeat: no-repeat;

        }

 

        .container {

            background-color: rgba(255, 255, 255, 0.5);

            padding: 20px;

            border-radius: 10px;

            margin-top: 100px;

        }

 

       

 

        button.btn {

            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

            background-color: #6c757d;

            border-color: #6c757d;

            border: none;

            padding: 10px 20px;

        }

    </style>

</head>

 

<body>

    <div class="container mt-5">

        <h1 class="text-center text-dark mb-5">Menu Principal</h1>

        <div class="row">

            <div class="col-md-3">

                <form action="{{ route('alumnos.index') }}" method="GET">

                    @csrf

                    <button type="submit" class="btn btn-primary btn-block text-light">ALUMNOS</button>

                </form>

            </div>

            <div class="col-md-3">

                <form action="{{ route('matricula.index') }}" method="GET">

                    @csrf

                    <button type="submit" class="btn btn-primary btn-block text-light">MATRICULAS</button>

                </form>

            </div>

            <div class="col-md-3">

                <form action="{{ route('instructores.index') }}" method="GET">

                    @csrf

                    <button type="submit" class="btn btn-primary btn-block text-light">INSTRUCTORES</button>

                </form>

            </div>

            <div class="col-md-3">

                <form action="{{ route('cursos.index') }}" method="GET">

                    @csrf

                    <button type="submit" class="btn btn-primary btn-block text-light">CURSOS</button>

                </form>

            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-12">

                <button class="btn btn-primary btn-block text-light">CURSOS INSTRUCTORES</button>

            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-12">

                <a href="{{ route('login.logout') }}" class="btn btn-link btn-block text-dark">Cerrar Sesión</a>

            </div>

        </div>

    </div>

 

   

 

    <!-- Agrega la referencia a los scripts de Bootstrap y jQuery -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

 

</html>

@endsection