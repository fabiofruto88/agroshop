<?php 
session_start();
error_reporting(0);
include('config.php');
$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}

$consulta="SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` WHERE `id_proveedor` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
  $id_agg= $mostar['id_proveedor'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Eliminar Producto</title>
</head>

<body style="background-color: rgb(148, 96, 17 );">

    <nav class="navbar navbar-expand-lg bg-success" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#"style="color: white;">Tu agro shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html"style="color: white;">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="vista_agro.php"style="color: white;">Mis Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="report_ped_agr.php"style="color: white;">Mis ventas</a>

                        </a>
                        
                </ul>
                <a class="nav-link me-2" aria-current="page" style="color: white;">usuario: <?php echo $mostar['nombre_proveedor']; ?></a></li>
         <a class="btn btn-danger" href="cerrar_s.php" role="button">cerrar sesion</a>
          

        <?php } ?>
                <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            </div>
        </div>
    </nav>

    <div class="container text-center mx-auto p-2 mt-5 rounded bg-light text-center">
        <form class="row g-3 m-1 p-1" method="post" action="elem_prod.php" >
        
            <div class="row g-3"><label for="formGroupExampleInput" class="form-label">ELIMINACION DEL PRODUCTO</label>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    
                    <br>
                    <select name="cod_prod" id="cod_prod" class="form-control">
                    <?php 
                    include("config.php");
                    $getpro1 = "SELECT * FROM producto where `id_proveedor`='$sesion' order by cod_producto";
                    $getpro2 = mysqli_query($conexion, $getpro1);
                    while ($row = mysqli_fetch_array($getpro2) ) {
                        $id= $row['cod_producto'];
                        $nombre =  $row['nombre_prod'];
                    ?>
                    <option value="<?php echo $id?>"><?php echo " id: ". $id . "   producto:  ". $nombre ?></option>
                    <?php
                    }

                    ?>
                    </select>
                   <!--  <label for="formGroupExampleInput" class="form-label">codigo del producto:</label>
                    <input type="text" name="cod_prod" class="form-control" placeholder="Nombre del producto"
                        aria-label="cod del producto"> -->

                </div>


            </div>
           

                <div class="row g-3">
                    


                  

                </div>
                <div class="modal" tabindex="-1" id="modal1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">¿seguro que quieres eliminar este producto?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>ADVERTENCIA!! esta accion no tiene recuperacion alguna de los datos borrrados</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                <button class="btn btn-danger" type="button" value="eliminar "  data-bs-toggle="modal" data-bs-target="#modal1  ">Eliminar</button>
               


        

        </form>

        <a class="btn btn-primary" href="vista_agro.php" role="button">Regresar</a>


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