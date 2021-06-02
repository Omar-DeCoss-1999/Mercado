<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="<?php echo asset('img/bg.jpg') ?>">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Introduzca su correo</h2>
                @if(session('error'))
                <p style="color:red;">{{session('error')}}</p>
                @endif
                <form action="/olpassword" method="post">
                    @csrf
                    <div class="inputBx">
                        <span>Correo</span>
                        <input type="text" name="correo" placeholder="Ingrese su correo">
                        {!! $errors->first('correo', '<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="" value="Verificar">
                    </div>
                    <div class="inputBx">
                        <p>¿Tienes una cuenta? <a href="login">Iniciar sesión</a></p>
                        <p>¿No tienes una cuenta? <a href="register">Crear cuenta</a></p>
                        <p>¿Desea regresar al inicio? <a href="/">Regresar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>