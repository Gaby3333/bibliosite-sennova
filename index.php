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
      <img class="menu_nav nombre_boton--click" src="RECURSOS/menu.svg">

      <ul class="ul"> 
        <li class="li"><a class="a" href="index.php">Inicio</a></li>
        <li class="li"><a class="a" href="#">Grupo idea</a></li>
        <li class="li"><a class="a" href="semilleros.php">Semilleros</a></li>
        <li class="li"><a class="a a_menu" href="proyectos.php">Proyectos</a></li>
        <li class="li boton_login"><img class="log_in" src="RECURSOS/ingresar.svg"></li>

      </ul>
      
    </nav>

    <main class="contenedor">
      <section id="logos_institucionales">
          <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx"><img src="RECURSOS/logos/sena.png" class="sena"></a>
          <a href="http://sennova.senaedu.edu.co/"> <img src="RECURSOS/logos/sennova.png" class="sennova"></a>
      </section>

      <aside id="novedades">
        <div>
          <a href="https://orientacionvocacional.sena.edu.co/"><img src="RECURSOS/logos/noticia.jpg" class="noticia"></a>
        </div>
        
         <main class="main">
              <div class="content-box">
                <center>
                  <h3>Convenio entre el SENA y el Instituto Geográfico Agustín Codazzi fortalecerá la formación en áreas relacionadas con el catastro multipropósito</h3>
                </center>
                
                <p>El acuerdo tiene una duración de tres años y espera beneficiar a aprendices, egresados y a la comunidad SENA en general.</p>

                  <center>
                    <h3>Ver</h3>
                  </center>

              </div>

              <div class="content-box">
                <center>
                  <h3>Los 10 cafés especiales que representarán a Caldas en Boston fueron seleccionados en el SENA</h3>
                </center>
                
                    <p>Specialty Coffee Expo será la feria en donde participarán los cafés especiales caldenses que fueron seleccionados en la Escuela Nacional de la Calidad del Café y Paisaje Cultural Cafetero de Colombia del SENA Caldas en Chinchiná.</p>

                  <center>
                    <h3>Ver</h3>
                  </center>

              </div>

              <div class="content-box">
                <center>
                  <h3>SENA Girardot cuenta con el 1er laboratorio de fabricación aditiva en Cundinamarca</h3>
                </center>
                
                  <p><br>Con una inversión alrededor de $448 millones de pesos para la adecuación del laboratorio, compra de equipos y materiales de formación, se llevó a cabo un importante plan de modernización que busca acercar a diferentes grupos de interés a la industria 4.0</p>

                  <center>
                    <h3>Ver</h3>
                  </center>

              </div>

              <div class="content-box">
                <center>
                  <h3>SENNOVA desarrolla prototipo de protector solar antienvejecimiento en el SENA Chocó</h3>
                </center>

                  <p>Con extractos de plantas y semillas de la región, el equipo de SENNOVA del SENA en el Chocó, desarrolla prototipo de cremas de piel con protector solar antienvejecimiento y componentes de rejuvenecimiento.</p>


                  <center>
                    <h3>Ver</h3>
                  </center>

                </div>

           </main>
        
      </aside>
      
    </main>

<!-- https://www.youtube.com/watch?v=JpaSz6XUtaw formulario 13:00 linea animado-->

    <section class="modal">
      <div class="contenedor_modal">
        <div class="cerrar">
          <h2 class="titulo_modal">Bienvenido a...</h2>
          <img class="boton_cerrar" src="RECURSOS/cerrar.svg">
        </div>
        <img class="imagen_modal" src="RECURSOS/logo_sin_fondo.png">
        <form class="formulario_modal" method="POST" action="ingreso.php"> 
          <div class="grupo_formulario">

            <input type="email" name="usuario" class="usuario_clave" placeholder=" " pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+.[a-z]" autocomplete="off" required>
            <label for="usuario" class="titulo_log_in">Correo usuario:</label>
            <span class="linea_formulario"></span>

          </div>   
          
          <div class="grupo_formulario"> 

            <input type="password" name="clave" class="usuario_clave" placeholder=" " required>
            <label for="clave" class="titulo_log_in">Contraseña:</label> 
            <span class="linea_formulario"></span>

          </div>
          

          <div class="a_volver">
            <input type="submit" name="enviar" value="Ingresar" class="volver">
          </div>

        </form>
      </div> 
    </section>

    <div id="contador_visitas">
      <?php
        $archivo = "registro_visitas.txt";
        $contador = intval(trim(file_get_contents($archivo)));

        $file=fopen($archivo,"w");
        fwrite($file, $contador+1);

        $file=fopen($archivo,"r");

        echo "<p class='visitas'><strong>Visitas: </strong>".fgets($file)."</p>";

        fclose($file);

      ?>      
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

  </body>
<script src="boton.js"></script>
<script src="modal.js"></script>
</html>