<?php
session_start();
$sesion= $_SESSION['usuario'];

if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}

include('config.php');

$consulta="SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` where `id_proveedor` ='$sesion' ";
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
                <a class="nav-link active me" href="vista_agro.php"style="color: white;">mis productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active me" href="report_ped_agr.php"style="color: white;">Mi ventas</a>
              </li>
              
              </li>
                        <li> <a class="nav-link active" aria-current="page" href="opciones_tr.php" style="color: white;">transporte</a></li>
                        </li>

              
        
            </ul>
            <a class="nav-link active me-2" style="color: white;"> usuario: <?php echo $mostar['nombre_proveedor']; ?></a>
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
    <form action="agg_venta.php" method="post" enctype="multipart/form-data">
    <div class="modal" tabindex="-1" id="modal1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Formulario de venta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

         
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label mt-0"> identificacion del cliente * </label>
               <select name="idcliente" id="idcliente" class="form-control" require>
                <option value="value2" selected>elegir</option>
              <?php 
              
              $getidcli1="SELECT `id_cliente`, `Nombre` FROM `cliente` order by `id_cliente`";
              $getidcli2= mysqli_query($conexion,$getidcli1);
                while ($row = mysqli_fetch_array($getidcli2) ) {
                $idc= $row['id_cliente'];
                $nombrec =  $row['Nombre'];
                ?>
                
                <option value="<?php echo $idc?>"><?php echo  $idc ." ". $nombrec ?></option>
                <?php
              }

             ?></select> </div>
             <div class="mb-3">
                <label for="disabledTextInput" class="form-label mt-0"> Codigo del producto  * </label>
                <select name="idproducto" id="idproducto" class="form-control" require>
                        <option value="value2" selected>elegir</option>
              <?php 
              
              $getidpro1="SELECT `cod_producto`, `nombre_prod` FROM `producto` where `id_proveedor`='$sesion' order by `cod_producto`";
              $getidpro2= mysqli_query($conexion,$getidpro1);
                while ($row = mysqli_fetch_array($getidpro2) ) {
                $idp= $row['cod_producto'];
                $nombrep =  $row['nombre_prod'];
                ?>
              

                <option value="<?php echo $idp?>"><?php echo  $idp ." ". $nombrep ?></option>
                <?php
              }

             ?></select> 

             </div>
           
             <div class="mb-3">
              <label for="disabledTextInput" class="form-label mt-0"> identificacion del trasnportador * </label>
               <select name="idtrr" id="idtrr" class="form-control" require>
               <option value="value2" selected>elegir</option>
              <?php 
                 
              $getidtr1="SELECT `nombre`, `id_trans` FROM `transportador` order by `id_trans`";
              $getitri2= mysqli_query($conexion,$getidtr1);
                while ($row = mysqli_fetch_array($getitri2) ) {
                $idtr= $row['id_trans'];
                $nombretr =  $row['nombre'];
                ?>
              
                <option value="<?php echo $idtr?>"><?php echo  $idtr ." ". $nombretr ?></option>
                <?php
              }

             ?></select> </div>
                
           
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">valor de descuento % (0-100)*</label>
              <input type="number" name="descuento" class="form-control" id="exampleFormControlInput1"
                placeholder="ingrese valor %" require>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">precio de envio*</label>
              <input type="number" name="envio" class="form-control" id="exampleFormControlInput1"
                placeholder="ingrese precio indicado" require>
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label mt-0">cantidad de producto * </label>
              <input type="number" name="cant" id="disabledTextInput" class="form-control"
                placeholder="cantidad (1-9999)">
            </div>
           
           


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">enviar</button>

          </div>
        </div>
      </div>
    </div>
  </form>

    <div class="container text-center bg-light mt-3 rounded">
      <div class="row">
        <div class="col-12">
        <caption><h1 style="text-align: center;">Agregar un Venta</h1></caption>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" style=" align-items: center;" width="10%" height="10%"
          fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
          <path
            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
        </svg>
        <br>
        
      
        </div>
   <button class="btn m-2 btn-outline-success " data-bs-toggle="modal" data-bs-target="#modal1" >Agregar</button>
        
      </div>
        </div>
      </div>
    </div>

    <div class="container-fluid  text-center py-2 mx-auto bg-light rounded mt-3" >
      <div class="table-responsive-lg">
<table class="table caption-top" >
            <caption><h1 style="text-align: center;">Mis ventas</h1></caption>
            <thead>
              <tr>
          
                
                <th scope="col">nombre de cliente</th>
                <th scope="col">identificacion cliente </th>
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
                    
                    $sql = "SELECT * FROM venta as v, cliente as c, proveedores as p, transportador as tr, producto as pro where c.id_cliente= v.id_cliente and p.id_proveedor = v.id_prov and tr.id_trans=v.id_tr and pro.cod_producto=v.cod_producto    and `id_prov`='$sesion'";
                    $resul = mysqli_query($conexion, $sql);

                    while ($mostar = mysqli_fetch_array($resul)) {



                    ?>
                        <tr>
                            <td><?php echo $mostar['Nombre'] ?></td>
                            <td><?php echo $mostar['id_cliente'] ?></td>  
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