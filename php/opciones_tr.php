<?php
session_start();
error_reporting(0);
include('config.php');
$sesion = $_SESSION['usuario'];
if ($sesion == null || $sesion == '') {
    echo 'no tiene acceso';
    die();
}

$consulta = "SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` WHERE `id_proveedor` ='$sesion' ";
$resultado = mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
    $id_agg = $mostar['id_proveedor'];
    $nombredelagricultor= $mostar['nombre_proveedor'];
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <title>Agricultor</title>
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


                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" style="color: white;">Action</a></li>
                                <li><a class="dropdown-item" href="#" style="color: white;">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" style="color: white;">Something else here</a></li>
                            </ul>
                        <li> <a class="nav-link active" aria-current="page" href="report_ped_agr.php" style="color: white;">mis
                                ventas</a></li>
                        </li>
                        <li> <a class="nav-link active" aria-current="page" href="vista_agro.php" style="color: white;">mis
                                productos</a></li>
                        </li>
                        <li> <a class="nav-link active" aria-current="page" href="opciones_tr.php" style="color: white;">transporte</a></li>
                        </li>


                    </ul>
                    <a class="nav-link me-2" aria-current="page" style="color: white;">usuario: <?php echo $mostar['nombre_proveedor']; ?></a></li>
                    <a class="btn btn-danger" href="cerrar_s.php" role="button">cerrar sesion</a>


                   <?php } ?>
               
                </div>
            </div>
        </nav>
        <!--   <-- nav bar -->

        <div class="container bg-light my-3 rounded">
            <div class="row">
                <div class="col">
                    
                    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-11 text-center mx-auto p-auto mt-5 bg-light rounded">
      <div class="table-responsive-lg m-2">
        <p class="h1 text-center m-3">Opciones de transporte</p>
        <table class="table ">

          <thead>
            <tr>

              <th>nombre</th>
              <th># id</th>
              <th>tipo id </th>
              
              <th>telefono</th>
              <th>direccion</th>
              <th>whatsapp</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysqli_error($mysqli));
            $sql = "SELECT * FROM  transportador";
            $resul = mysqli_query($conexion, $sql);

            while ($mostar = mysqli_fetch_array($resul)) {



            ?>
              <tr>
                <td><?php echo $mostar['nombre'] ?></td>
                <td><?php echo $mostar['id_trans'] ?></td>
                <td><?php echo $mostar['tipo_id'] ?></td>
                
                <td><?php echo $mostar['telefono'] ?></td>
                <td><?php echo $mostar['direccion'] ?></td>
                <td><a href="https://api.whatsapp.com/send/?phone=57,<?php echo $mostar['telefono'] ?>&text=Hola%2C+soy+el+agricultor+<?php echo $nombredelagricultor ?>+estoy+interesado+en+un+servicio+de+transporte+&type=phone_number&app_absent=0" class="btn btn-success btn-md">contactar (whastapp)</a></td>
                  

          

                

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      
      </div>


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