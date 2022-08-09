<?php
session_start();
//include('config.php');
require 'ct.php';
require 'database.php';
$db = new Database;
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la peticion';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if ($token == $token_tmp) {

        $sql =  $con->prepare(" SELECT count($id) FROM `producto` where `cod_producto` =?  ");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare(" SELECT  `cod_producto`, `nombre_prod`, `precio`, `tipo_de_producto`, `peso`, `cuidad`, `departamento`, `img`, `descripcion`,  `id_proveedor` FROM `producto` where cod_producto =?  ");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $Nombre = $row['nombre_prod'];
            $precio = $row['precio'];
            $tipo_de_producto = $row['tipo_de_producto'];
            $peso = $row['peso'];
            $ciudad = $row['cuidad'];
            $depar = $row['departamento'];
            $des = $row['descripcion'];
            $img = base64_encode($row['img']);
            $proved= $row['id_proveedor'];
           
           
        }
    } else {
        echo 'Error al procesar la peticion';
        exit;
    }


}

  include("config.php");
  $query2 = "SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` WHERE `id_proveedor` ='$proved' ";
$rr= mysqli_query($conexion, $query2);
while ($mostar = mysqli_fetch_array($rr)) {
   $nombre_prov=  $mostar['nombre_proveedor'];
   $tel_prov = $mostar['telefono'];
}




?>
<?php 

error_reporting(0);

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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>DETALLES</title>
</head>

<body style="background-color: rgb(148, 96, 17 );">

    <!-- <nav class="navbar" style="background-color: #239B56 ;">
        <!-- Navbar content -->
    <!--  </nav> -->
    <!--  -->

    <nav class="navbar navbar-expand-lg bg-success" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">Tu agro shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html" style="color: white;">Inicio</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" style="color: white;">Action</a></li>
                            <li><a class="dropdown-item" href="#" style="color: white;">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" style="color: white;">Something else here</a></li>
                        </ul>
                    <li> <a class="nav-link active" aria-current="page" href="repot_ped_agr.html" style="color: white;"></a></li>
                    </li>
                    <li> <a class="nav-link active" aria-current="page" href="vista_agro.html" style="color: white;"></a></li>
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
    <!--   <-- nav bar -->




    <div class="container mt-3 bg-light text-center rounded ">

        <div class="row">
            <div class="col-md-6 order-md-1 my-3 text-center">
                <img class="card-img" src="data:image/jpg;base64, <?php echo $img; ?> " alt="">

            </div>
            <div class="col-md-6 order-md-2 my-3">
                <h2>Producto: <?php echo $Nombre; ?></h2>
                <p class="p">Precio: <?php echo MONEDA . number_format($precio, 2, ',', '.'); ?> </p>
                <p class="p">tipo: <?php echo $tipo_de_producto; ?> </p>
                <p class="p">Peso(Kg): <?php echo $peso ?></p>
                <p class="p">Ubicacion: <?php echo $ciudad . "/" . $depar ?> </p>
                <p class="p">Vendedor: <?php echo $nombre_prov ?></p>
                <p class="p"><?php echo $des ?></p>
                
               <!-- <a href="https://api.whatsapp.com/send/?phone=57,<?php echo $tel_prov ?>&text=Hola%2C+te+contacto+por+la+p%C3%A1gina+web+detucampo.com&type=phone_number&app_absent=0" class="btn btn-success btn-md">contactar (whastapp)</a> -->
                <a class="btn btn-primary" href="vista_agro.php">regresar</a>
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