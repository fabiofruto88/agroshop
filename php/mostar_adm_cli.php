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
    <title>Reporte total de usuario</title>
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
              <a class="nav-link active" aria-current="page" href="../index.html" style="color: white;">Inicio</a>
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
              <a class="nav-link active me" href="admn_control_usuarios.html" style="color: white;">reporte de
                usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active me" href="reporte_total_ventas_adm.html" style="color: white;">Reporte
                ventas</a>
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


    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-11 text-center mx-auto p-auto mt-5 bg-light rounded">
      <div class="table-responsive-lg m-2">
        <p class="h1 text-center m-3">Reporte Total usuarios clientes</p>
        <table class="table ">

          <thead>
            <tr>
              <th># id</th>
              <th>nombre</th>

              <th>telefono</th>
              <th>direccion</th>
              <th>contraseña</th>
              <th>opciones</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysqli_error($mysqli));
            $sql = "SELECT * FROM cliente";
            $resul = mysqli_query($conexion, $sql);

            while ($mostar = mysqli_fetch_array($resul)) {



            ?>
              <tr>
                <td><?php echo $mostar['id_cliente'] ?></td>
                <td><?php echo $mostar['Nombre'] ?></td>
                <td><?php echo $mostar['telefono'] ?></td>
                <td><?php echo $mostar['direccionc'] ?></td>
                <td><?php echo $mostar['passw'] ?></td>

                <td>

                  <a class="btn btn-primary" href="editar_c.php?id=<?php echo $mostar['id_cliente'] ?>">Editar</a>

                  
                    <!-- <input  value="<?php echo $mostar['id_cliente'] ?>" name="txtid_cliente" readonly> -->
                  <!-- type="hidden" -->
                <td>
                <a class="table__item__link btn btn-danger" href="eliminar_c.php?id=<?php echo $mostar['id_cliente'] ?>">Eliminar</a>
                  <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal1  ">eliminar</button> -->
                </td>

                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <!-- <form action="eliminar_c.php" method="post">
        <div class="modal" tabindex="-1" id="modal1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿seguro que quieres eliminar este cliente?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>ADVERTENCIA!! esta accion no tiene recuperacion alguna de los datos borrrados</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button class="btn btn-danger" type="submit" value="eliminar" name="btn_eliminar"> eliminar</button>
              </div>
            </div>
          </div>
        </div>
        </form> -->
      </div>

    </div>

    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-11 text-center mx-auto p-auto mt-5 bg-light rounded">
      <div class="table-responsive-lg m-2">
        <p class="h1 text-center m-3">Reporte Total usuarios agricultores</p>
        <table class="table ">

          <thead>
            <tr>

              <th>nombre</th>
              <th># id</th>
              <th>tipo id </th>
              <th>contraseña</th>
              <th>telefono</th>
              <th>direccion</th>
              <th>opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysqli_error($mysqli));
            $sql = "SELECT * FROM  proveedores";
            $resul = mysqli_query($conexion, $sql);

            while ($mostar = mysqli_fetch_array($resul)) {



            ?>
              <tr>
                <td><?php echo $mostar['nombre_proveedor'] ?></td>
                <td><?php echo $mostar['id_proveedor'] ?></td>
                <td><?php echo $mostar['tipo_id'] ?></td>
                <td><?php echo $mostar['password'] ?></td>
                <td><?php echo $mostar['telefono'] ?></td>
                <td><?php echo $mostar['direccion'] ?></td>
                <td>
                  <a class="btn btn-primary" href="editar_a.php?id=<?php echo $mostar['id_proveedor'] ?>">Editar</a>

                  <!-- <form action="eliminar_a.php" method="post">
                    <input type="hidden" href="eliminar_a.php?id=<?php echo $mostar['id_proveedor'] ?>" readonly> -->
                <td>
                <a class="table__item__link btn btn-danger" href="eliminar_a.php?id=<?php echo $mostar['id_proveedor'] ?>">Eliminar</a>
                  <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal2  ">eliminar</button> -->
<!--   <div class="modal" tabindex="-1" id="modal2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿seguro que quieres eliminar este agricultor?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>ADVERTENCIA!! esta accion no tiene recuperacion alguna de los datos borrrados</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <button class="btn btn-danger" type="submit" value="eliminar" name="btn_eliminar"> eliminar</button>
              </div>
            </div>
          </div>
        </div>
        </form> -->                </td>

                </td>

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      

      </div>

    </div>

    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-11 col-sm-11 col-11 text-center mx-auto p-auto mt-5 bg-light rounded">
      <div class="table-responsive-lg m-2">
        <p class="h1 text-center m-3">Reporte Total usuarios transportador</p>
        <table class="table ">

          <thead>
            <tr>

              <th>nombre</th>
              <th># id</th>
              <th>tipo id </th>
              <th>contraseña</th>
              <th>telefono</th>
              <th>direccion</th>
              <th>opciones</th>
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
                <td><?php echo $mostar['password'] ?></td>
                <td><?php echo $mostar['telefono'] ?></td>
                <td><?php echo $mostar['direccion'] ?></td>
                <td>
                  <a class="btn btn-primary" href="editar_tr.php?id=<?php echo $mostar['id_trans'] ?>">Editar</a>

           <!--  <form action="eliminar_tr.php" method="post">
                    <input type="hidden" value="<?php echo $mostar['id_trans'] ?>" name="txtid_tr" readonly> -->
                <td><!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal3  ">eliminar</button> --> 
                <a class="table__item__link btn btn-danger" href="eliminar_tr.php?id=<?php echo $mostar['id_trans'] ?>">Eliminar</a>
              </td>

                

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      
      </div>

    </div>
            <script src="../js/modal_elim_c.js" ></script>
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