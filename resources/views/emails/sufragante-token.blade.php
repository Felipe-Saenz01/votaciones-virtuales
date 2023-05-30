<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Código de Acceso</title>
</head>
<body>
    <div class="mx-auto bg-gray-700 text-gray-200">
        <h1>Bienvenido {{ $nombres}} </h1>
        <h3>Este es tu código de acceso </h3>
        <p> Copia y pega el código de acceso para ingresar al sistema de votaciones virtuales de Unitrópico  </p>
        <p><strong>{{ $token }}</strong>  </p>
    </div> 
</body>
</html>