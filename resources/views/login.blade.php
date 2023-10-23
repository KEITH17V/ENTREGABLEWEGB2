<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-image: linear-gradient(300deg, #eeffff 0, #bdf2ff 25%, #84ccef 50%, #42a7d4 75%, #0087bd 100%);
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
            margin: 0;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            color: #007bff;
        }
    </style>
</head>
<body>
   
    <h1>Iniciar Sesión</h1>
    
    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        <label for="email">Correo Electrónico:</label>
        <input type="text" name="email" id="email" value="jorge@gmail.com">
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" value="jorge">
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>

    @if(session('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif

</body>
</html>