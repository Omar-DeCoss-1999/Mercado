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
                <h2>Restablezca su contraseña</h2>
                @if(session('error'))
                <p style="color:red;">{{session('error')}}</p>
                @endif
                <form action="/olpassword/{{$correo}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="inputBx">
                        <span>Ingrese la nueva ontraseña</span>
                        <input type="password" name="password" placeholder="Ingrese su contraseña">
                        {!! $errors->first('password', '<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="inputBx">
                        <span>Verefique contraseña</span>
                        <input type="password" name="password2" placeholder="Verifique su contraseña">
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