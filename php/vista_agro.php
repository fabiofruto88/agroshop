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

  <!-- <nav class="navbar" style="background-color: #239B56 ;">
        <!-- Navbar content -->
  <!--  </nav> -->
  <!--  -->

  <nav class="navbar navbar-expand-lg bg-success" >
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: white;">Tu agro shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <li> <a class="nav-link active" aria-current="page" href="vista_agro.html" style="color: white;">mis
              productos</a></li>
          </li>
          <li> <a class="nav-link active" aria-current="page" href="opciones_tr.php" style="color: white;">transporte</a></li>
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

  <div class="container-flex  d-none d-lg-block ">

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
      aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
      aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href=""> <img src="../img/aguacate.jpg" class="d-block w-100" alt="..."></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Aguacate de la mejor calidad</h5>
        <p>encontras variedades de productos agricolas a precio de distribuidor</p>
        <p>PROMOCION 30% DESCUENTO</p>
      </div>
    </div>
    <div class="carousel-item">
      <a href=""><img src="../img/papa1.jpg" class="d-block w-100" alt="..."></a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Papa de la mejor calidad</h5>
        <p>encontras variedades de productos agricolas a precio de distribuidor</p>
        <p>PROMOCION 30% DESCUENTO</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../img/yuca-b.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Yuca de la mejor calidad</h5>
        <p>encontras variedades de productos agricolas a precio de distribuidor</p>
        <p>PROMOCION 30% DESCUENTO</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
    data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div class="container text-center">
<div class="row  my-2  ">
        <div class="col-3 bg-light mx-auto rounded ">
         <p class="h3"> mis productos</p>
        </div>
       </div>
</div>
  <div class="container-fluid  mt-2 ">
       
       <div class="row p-1 mt-3">  
   <?php
       require 'ct.php';
     

       $query = " SELECT `cod_producto`, `nombre_prod`, `precio`, `tipo_de_producto`, `peso`, `cuidad`, `departamento`, `img`, `descripcion`, `id_proveedor` FROM `producto` where `id_proveedor`='$sesion' ";
       $resultado = $conexion->query($query);
       while ($row = $resultado->fetch_assoc()) {
           
       
       ?>
           <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12  text-center pt-3">

               <div class="card">
                    
                   <img src="data:image/jpg;base64, <?php echo base64_encode($row['img']) ; ?> " class="card-img-top" alt="..."style="min-height: 150px;max-height: 150px;" >
                   <div class="card" style="border-color: none; ">
                       <h5 class="card-title">
                         <?php echo $row['nombre_prod']; ?>
                       </h5>


                       <p6 class="card-text"> precio: <?php echo $row['precio']; ?> <br>
                       Tipo <?php echo $row['tipo_de_producto'];?> <br>
                       Peso(Kg) <?php echo $row['peso']; ?> <br>
                        <?php echo $row['cuidad']."/". $row['departamento']; ?> <br>
                      
                       </p6>
                       <a href="detalles_prod.php?id=<?php echo $row['cod_producto'];?>& token=<?php echo hash_hmac('sha1', $row['cod_producto'],KEY_TOKEN);   ?>" class="btn btn-success btn-sm">ver Producto</a>
                   </div>
               </div>


           </div> 
           <?php
       }
   ?>



       </div>



   </div>
  

  <div class="container  mt-3 bg-light  rounded" >
    <div class="row ">
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 rounded text-center rounded  justify-content-center py-3 " >
      
        <p class="h6">Agregar Nuevo Producto</p>
        <!--  <img src="img/yuca-b.jpg" alt="" style="max-width: 10rem ;"> -->
        <svg xmlns="http://www.w3.org/2000/svg" style=" align-items: center; margin: 1rem; " width="35%" height="35%"
          fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
          <path
            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
        </svg>
        <br>
        <a class="btn btn-success btn-lg" href="../html/form_agg_prod.html" role="button">Agregar</a>
      </div>

      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center rounded  justify-content-center p-3 ">
        <p class="h6">Modificar Un Producto Existente</p>
        <svg xmlns="http://www.w3.org/2000/svg"  style="margin: 1rem;" width="35%" height="35%" fill="currentColor"
          class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
          <path
            d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
        </svg>
        <br>
        
        <form action="actualizar_adm_ag.php" method="post">
                <select name="cod_prod" id="cod_prod" class="form-control">
                  <option value="value2" selected>elegir</option>
                  <?php

                  $getpro1 = "SELECT * FROM `producto` where `id_proveedor`='$sesion'  order by `cod_producto`";
                  $getpro2 = mysqli_query($conexion, $getpro1);
                  while ($row = mysqli_fetch_array($getpro2)) {
                    $iddd = $row['cod_producto'];

                  ?>
                    <option value="<?php echo $iddd ?>"><?php echo " id: " . $iddd ?></option> <?php   } ?>

                </select>

                <button type="submit" class="btn btn-primary my-2">actualizar</button>
              </form>

      </div>
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center rounded  p-3 justify-content-center">
       <p class="h6">Eliminar Un Producto Existente</p> 

        <svg xmlns="http://www.w3.org/2000/svg"  style="margin: 1rem;" width="35%" height="35%" fill="currentColor"
          class="bi bi-backspace-fill" viewBox="0 0 16 16">
          <path
            d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
        </svg>
        <br>
        <a class="btn btn-danger btn-lg" href="eliminar_prod_ag.php" role="button">Eliminar</a>
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