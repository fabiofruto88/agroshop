<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>PRODUCTOS</title>
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
                <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            </div>
        </div>
    </nav>
    <!--   <-- nav bar -->




    <div class="container-fluid  mt-2 ">
       
        <div class="row p-1 mt-3">  
    <?php
        require 'ct.php';
        include('config.php');

        $query = " SELECT `cod_producto`,  `nombre_prod`, `precio`, `tipo_de_producto`, `peso`, `cuidad`, `departamento`, `img`, `descripcion`,  `id_proveedor`  FROM `producto` ";
        $resultado = $conexion->query($query);
        while ($row = $resultado->fetch_assoc()) {
            
        
        ?>
            <div class="col-xxl-1 col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6  text-center pt-3">

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