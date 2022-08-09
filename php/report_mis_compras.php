<?php
session_start();
$sesion= $_SESSION['usuario'];

if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}

include('config.php');

$consulta="SELECT `id_cliente`, `Nombre`, `telefono`, `direccionc`, `passw` FROM cliente where `id_cliente` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <title>Reporte de pedidos agricultor</title>
</head>
<body style="background-color: rgb(148, 96, 17 );">

<nav class="navbar navbar-expand-lg bg-success" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#"style="color: white;">Tu agro shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
   
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"style="color: white;">Action</a></li>
                  <li><a class="dropdown-item" href="#"style="color: white;">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"style="color: white;">Something else here</a></li>
                </ul>
              </li>
              
            
              <li class="nav-item">
                <a class="nav-link active me" href="report_cli.php"style="color: white;">Todos Los productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active me" href="report_mis_compras.php"style="color: white;">Mi compra</a>
              </li>
              
              <li>
              
              </li>
              
        
            </ul>
            <a class="nav-link active me-2" style="color: white;"> usuario: <?php echo $mostar['Nombre']; ?></a>
            <a class="btn btn-danger " href="cerrar_s.php" role="button">cerrar sesion</a>
            <?php } ?>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
    <!--   <-- nav bar --> 
    


    <div class="container-fluid  text-center py-2 mx-auto bg-light rounded mt-3" >
      <div class="table-responsive-lg">
<table class="table caption-top" >
            <caption><h1 style="text-align: center;">Mis compras</h1></caption>
            <thead>
              <tr>
          
                
                <th scope="col">nombre del vendedor</th>
                <th scope="col">identificacion del vendedor </th>
                <th scope="col">producto</th>
                <th scope="col">transportador</th>
                <th scope="col">descuento</th>
                <th scope="col">origen</th>          
                <th scope="col">destino</th>
                <th scope="col">valor transporte</th>
                <th scope="col">precio unitario</th>
                <th scope="col">cantidad</th>
                <th scope="col">valor total</th>
                <th scope="col">estado</th>
                <th scope="col">factura</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php
                    
                    $sql = "SELECT * FROM venta as v, cliente as c, proveedores as p, transportador as tr, producto as pro where c.id_cliente= v.id_cliente and p.id_proveedor = v.id_prov and tr.id_trans=v.id_tr and pro.cod_producto=v.cod_producto    and v.id_cliente='$sesion'";
                    $resul = mysqli_query($conexion, $sql);

                    while ($mostar = mysqli_fetch_array($resul)) {



                    ?>
                        <tr>
                            <td><?php echo $mostar['nombre_proveedor'] ?></td>
                            <td><?php echo $mostar['id_proveedor'] ?></td>  
                            <td><?php echo $mostar['nombre_prod'] ?></td>  
                            <td><?php echo $mostar['nombre'] ?></td>  
                            <td><?php echo $mostar['descuento'] . "%" ?></td>  
                            <td><?php echo $mostar['cuidad'] . " / " . $mostar['departamento']?></td> 
                            <td><?php echo $mostar['direccionc'] ?></td> 
                            <td><?php echo $mostar['pre_trans'] ?></td> 
                            <td><?php echo $mostar['precio_uni'] ?></td> 
                            <td><?php echo $mostar['cant'] ?></td> 
                            <td><?php echo "$ " . $mostar['total'] ?></td> 
                            <td><?php echo $mostar['estado'] ?></td> 
                            <td><a class="btn btn-primary" href="imprimir.php?id=<?php echo $mostar['cod_venta'] ?>">imprimir</a></td> 
                         
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
          </table>
      </div>  
      
    </div>
    

    <script src="../libs/bootstrap/js/bootstrap.min.js" ></script>
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