<?php
session_start();
error_reporting(0);

include('config.php');
$sesion = $_SESSION['usuario'];
if ($sesion == null || $sesion == '') {
    echo 'no tiene acceso';
    die();
}
$consulta="SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` WHERE `id_proveedor` ='$sesion' ";
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
        <title>Actulizar Producto</title>
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
                            <a class="nav-link active" href="../php/validar_adm.php" style="color: white;">modificar productos</a>
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
                            <a class="nav-link active me" href="reporte_total_ventas_adm.html" style="color: white;">Reporte ventas</a>
                        </li>

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

        <div class="container-fluid bg-light rounded">
          <div class="table-responsive-xl m-2">
          
            <p class="h1 text-center m-3">ACTUALIZACION DEL PRODUCTO</p>
            
            <table class="table">

                <thead>
                    <tr>
                       
                        <th>nombre</th>
                        <th>precio</th>
                        <th>peso (kg)</th>
                        <th>ciudad</th>
                        <th>departamento</th>
                        <th>descripcion</th>
                        
                      
                    </tr>
                </thead>
                <tbody>
             <?php
                  $idd=$_POST['cod_prod'];    
                    
                    $sql = "SELECT * FROM `producto` WHERE `cod_producto` ='$idd'";
                    $resul = mysqli_query($conexion, $sql);

                    while ($mostar = mysqli_fetch_array($resul)) {



                    ?>
                <tr>
             <form class="row g-3 p-1 m-1" method="post" action="update_prod_ag.php">
                           <input class="invisible"type="text" value="<?php echo $mostar['cod_producto'] ?>" name="cod_prod" readonly> 
                            <td><input type="text" value="<?php echo $mostar['nombre_prod'] ?>" name="prod"> </td>
                             <td><input type="text" value="<?php echo $mostar['precio'] ?>" name="precio"> </td>
                             <td><input type="text" value="<?php echo $mostar['peso'] ?>" name="peso"> </td>
                            
                            <td><input type="text" value="<?php echo $mostar['cuidad'] ?>" name="ciudad"> </td>
                            <td><input type="text" value="<?php echo $mostar['departamento'] ?>" name="departamento"> </td>    
                           
                            <td><input type="textarea" value="<?php echo $mostar['descripcion'] ?>" name="descrip"> </td>
                            </tr>
                    <?php
                    }
                    ?>
                    
                    
                </tbody>
            </table>
            <div class="col text-center my-2">
              <button class="btn btn-success" type="button" value="Actualizar" data-bs-toggle="modal" data-bs-target="#modal1  ">Actualizar</button>
              <a class="btn btn-primary" href="vista_agro.php" role="button">Regresar</a>
        
            </div>
        </div> 
 
            <div class="modal" tabindex="-1" id="modal1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">¿seguro que quieres Actualizar este producto?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>ADVERTENCIA!! esta accion no tiene recuperacion alguna de los cambios anteriores</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            

            
            </form>

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