<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="<?php echo asset('css/style.css')?>">
</head>
<body>
    <section>
      <div class="imgBx">
        <img src="<?php echo asset('img/bg.jpg')?>">
      </div>
      <div class="contentBx">
        <div class="formBx">
          <h2>¡Bienvenido!</h2>
          <form action="" method="post">
            <div class="inputBx">
              <span>Usuario</span>
              <input type="text" name="" id="" placeholder="Ingrese su usuario">
            </div>
            <div class="inputBx">
              <span>Contraseña</span>
              <input type="password" name="" id="" placeholder="Ingrese su contraseña">
            </div>
<!--             <div class="remember">
              <label><input type="checkbox" name="" id=""> Recuerdame</label>
            </div> -->
            <div class="inputBx">
              <input type="submit" name="" id="" value="Entrar">
            </div>
            <div class="inputBx">
              <p>¿No tienes una cuenta? <a href="register">Crear cuenta</a></p>
              <p>¿Desea regresar al inicio? <a href="/">Regresar</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
</body>
</html>