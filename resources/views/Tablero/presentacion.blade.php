<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
</head>
<body>
    <center>
        <h1>¡Bienvenido!  {{ auth()->user()->nombre }} </h1>
        <h1>Tu rol es {{ auth()->user()->rol }} </h1>
    </center>
</body>
</html>