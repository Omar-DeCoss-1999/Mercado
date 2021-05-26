<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>">
</head>
<body>
    <section>
        <div class="imgBx">
          <img src="<?php echo asset('img/bg2.jpg')?>">
        </div>
        <div class="contentBx">
          <div class="formBx">
            <h2>Registrate</h2>
            <form action="" method="post">
              <div class="inputBx">
                <span>Nombre del usuario</span>
                <input type="text" name="" id="" placeholder="Ingrese su nombre">
              </div>
              <div class="inputBx">
                <span>Apellido paterno</span>
                <input type="text" name="" id="" placeholder="Ingrese su apellido paterno">
              </div>
              <div class="inputBx">
                <span>Apellido materno</span>
                <input type="text" name="" id="" placeholder="Ingrese su apellido materno">
              </div>
              <div class="inputBx">
                <span>Correo electronico</span>
                <input type="email" name="" id="" placeholder="Ingrese su correo electronico">
              </div>
              <div class="inputBx">
                <span>Foto del usuario</span>
                <input type="file" name="" id="">
              </div>
              <div class="inputBx">
                <span>Contraseña</span>
                <input type="password" name="" id="" placeholder="Ingrese su contraseña">
              </div>
              <div class="inputBx">
                <span>Verifique su contraseña</span>
                <input type="password" name="" id="" placeholder="Escriba nuevamente su contraseña">
              </div>
              <div class="inputBx">
                <input type="submit" name="" id="" value="Registrarse">
              </div>
              <div class="inputBx">
                <p>¿Ya tienes una cuenta? <a href="login">Inicia sesión</a></p>
              </div>
            </form>
          </div>
        </div>
      </section>
</body>
</html>