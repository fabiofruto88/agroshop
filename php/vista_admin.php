<?php
session_start();
error_reporting(0);

include('config.php');
$sesion = $_SESSION['usuario'];
if ($sesion == null || $sesion == '') {
  echo 'no tiene acceso';
  die();
}
$consulta = "SELECT `id_adm`, `nombre`, `password` FROM `administrador`  WHERE `id_adm` ='$sesion' ";
$resultado = mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>ADMINISTRADOR</title>
  </head>

  <body style="background-color: rgb(148, 96, 17 );">



    <nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white;">Tu agro shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
 
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="vista_admin.php" style="color: white;">modificar productos</a>
            </li>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active me" href="../php/mostar_adm_cli.php" style="color: white;">reporte de usuarios</a>
            </li>
            <li class="nav-item">
              
            </li>

          </ul>
          <a class="nav-link me-2" aria-current="page" style="color: white;">usuario: <?php echo $mostar['nombre']; ?></a></li>
          <a class="btn btn-danger" href="cerrar_s.php" role="button">cerrar sesion</a>
        <?php } ?>
        <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
      </div>
    </nav>


    <div class="container text-center mx-auto mt-5 bg-light rounded m-3">
      <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-11 col-11  text-center p-3 m-2">
          <p class="h3"> BIENVENIDO ADMINISTRADOR</p>
        </div>

        <div class="row">
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  text-center p-2   rounded">
            <p class="h3">Modificar Un Producto Existente</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
              <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
            </svg>

            <!-- <a class="btn btn-secondary" href="../php/actualizar_adm_pro.php" role="button">Actualizar</a> -->
           
              <form action="actualizar_adm_pro.php" method="post">
                <select name="cod_prod" id="cod_prod" class="form-control">
                  <option value="value2" selected>elegir</option>
                  <?php

                  $getpro1 = "SELECT * FROM `producto`  order by `cod_producto`";
                  $getpro2 = mysqli_query($conexion, $getpro1);
                  while ($row = mysqli_fetch_array($getpro2)) {
                    $iddd = $row['cod_producto'];

                  ?>
                    <option value="<?php echo $iddd ?>"><?php echo " id: " . $iddd ?></option> <?php   } ?>

                </select>

                <button type="submit" class="btn btn-primary my-2">actualizar</button>
              </form>
          

          </div>




       
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12  col-sm-12 col-12  text-center p-2  rounded">
          <p class="h3">Eliminar Un Producto Existente</p>

          <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
          </svg>
          <br><br>
          <a class="btn btn-danger" href="../php/elim_pr_admhtml.php" role="button">Eliminar</a>
        </div>

      </div>










    </div>
    </div>






    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
  </body>
  <footer class="text-center text-lg-start text-light bg-success text-muted mt-3">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4  ">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block text-light">
        <span>Copyright © Todos los derechos de autor reservados, tecnologia desarrollada con ayuda del departamento de
          ingenieria de
          la universidad ITSA
          Conéctese con nosotros en las redes sociales:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset text-light">
          <i class="fab fa-facebook-f "></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class=" text-light">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>SHOP Del campo
            </h6>
            <p>
              somos una alternativa de comercio de nuestro campo colombiano
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              desarrolladores
            </h6>
            <p>
              <a href="https://www.instagram.com/jesulin_jimenez/" class="text-reset">Jesus Jimenez</a>
            </p>
            <p>
              <a href="https://www.instagram.com/fabiofruto8/" class="text-reset">Fabio Fruto</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Power by

            </h6>
            <div> <img src="img/ITSA.png" alt="" style="max-width: 100px ; max-height:100px ;"></div>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Barranquilla, co, Atlantico</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              delcampo@itsa.edu.co
            </p>
            <p><i class="fas fa-phone me-3"></i> +57 300 2549872</p>
            <p><i class="fas fa-print me-3"></i> +57 320 4412611</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4 text-light" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2022 Copyright:
      <a class="text-reset fw-bold" href="https://www.itsa.edu.co/">departamento de ingenieria de la universidad
        ITSA</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  </html>