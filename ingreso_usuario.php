<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <title>BiblioSite SENNOVA</title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="shortcut icon" href="RECURSOS/logos/sena_pestaña.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

  <body>
    <header class="header">
      <img src="RECURSOS/logo_sin_fondo.png" class="logo">
    </header>

    <nav class="nav">
      <ul class="ul"> 
        <li class="li"><a class="a" href="index.php">Inicio</a></li>
        <li class="li"><a class="a" href="#">Grupo idea</a></li>
        <li class="li"><a class="a" href="semilleros.php">Semilleros</a></li>
        <li class="li"><a class="a a_menu" href="proyectos.php">Proyectos</a></li>
        <li class="li boton_login"><img class="log_in" src="RECURSOS/ingresar.svg"></li>

      </ul>
      
    </nav>

    <div id="contenedor">
      <h1>Ingreso de usuarios</h1>
      <form method="POST" action="registro_ingreso_usuarios.php" id="formulario">
        <p>
          <span class="titulo_ingreso">Nombre de usuario: </span>
          <input class="ingreso_texto" type="text" name="nombre_usuario">
        </p>
        <p>
          <span class="titulo_ingreso">Correo electrónico: </span>
          <input class="ingreso_texto" type="text" name="correo_usuario">
        </p>
        <p>
          <span class="titulo_ingreso">Contraseña: </span>
          <input class="ingreso_texto" type="text" name="clave_usuario">
        </p>
        <p>
          <span class="titulo_ingreso">Confirmar contraseña: </span>
          <input class="ingreso_texto" type="text" name="clave_usuario">
        </p>
        <input type="hidden" name="permisos" value="1">

        <div class="a_volver">
        <input type="submit" name="enviar" class="volver formulario_ingreso">
      </div>
      </form>
    </div>

    <!-- BOTON DE WHATSAPP-->
    <div class="whatsapp">
      <a href="https://wa.me/3162847262?text=Hola, me gustaría obtener más información/reportar un error en la pagina">
        <img class="botonWhatsapp" src="RECURSOS/logos/pqr.png" title="¿Tienes dudas o sugerencia?, contantate con nosotros">
      </a>  
    </div>

  <footer id="pie-pagina" lang="es">
    <p class="footer"> &copy; <?php echo date('Y', time());?> <b>Semillero 3DSoft </b></p>
  </footer>

  <script src="js/ingreso_usuarios.js"></script>
</body>
</html>