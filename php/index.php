<?php  session_start();

$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
  echo 'no tiene acceso';
  die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Consulta basica</title>
</head>
<body>











<?php 





if(isset($_SESSION['carrito'])){
$carrito_mio=$_SESSION['carrito'];
// $_SESSION['carrito']=$carrito_mio;
}




// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
        if(isset($carrito_mio[$i])){
        if($carrito_mio[$i]!=NULL){ 
        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
        $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
    $totalcantidad += $total_cantidad;
    }}}
}

    //declaramos variables
     if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}



include('config.php');

$consulta="SELECT `id_cliente`, `Nombre`, `telefono`, `direccionc`, `passw` FROM cliente where `id_cliente` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <title>CLIENTE</title>
  </head>
  <body style="background-color: rgb(148, 96, 17 );">

    <!-- <nav class="navbar" style="background-color: #239B56 ;">
        <!-- Navbar content -->
     <!--  </nav> --><!--  --> 

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
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart"  style="color: white;"><i >carrito</i> <?php echo $totalcantidad; ?></a>
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










<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
                                if($carrito_mio[$i]!=NULL){
							?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span class="text-muted"  style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> €</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
                            }
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (EUR)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							echo $total; ?> €</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
        <a type="button" class="btn btn-success" href="../Carrito de compra paso 2/index.php">Continuar pedido</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->















<!-- vista C -->
<div class="container p-2 center  mt-5">
    <div class="card pt-3" >
            <p class="h3 text-center" >Modificar mi pedido</p>
        <div class="container-fluid p-3">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>


<th scope="col">Artículo</th><th scope="col">Cantidad</th>
<th scope="col">Precio</th>
<th scope="col">Borrar</th>
</tr>
</thead>
<tbody>
      




            <div class="container_card">
 
            <?php
            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
            if(isset($carrito_mio[$i])){
            if($carrito_mio[$i]!=NULL){
            ?>
<?php if ($carrito_mio[$i]['ref'] != 'portes'){ ?>
<tr>
<th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>





<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['titulo'] ?></td>
<td style="vertical-align: middle;">
<form id="form2" name="form1" method="post" action="cart.php">
          <input name="id" type="hidden" id="id" value="<?php print $i;   ?>" class="align-middle" />
          <input  name="cantidad" type="text" id="cantidad" style="width:50px;" class="align-middle text-center"   value="<?php print $carrito_mio[$i]['cantidad'];   ?>" size="1" maxlength="4"  />
          <input  type="image" name="imageField3" src="../img/actualiza.png" value="" class="btn btn-sm btn-primary btn-rounded" />
          </form>   
</td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] ?>$</td>
<td style="vertical-align: middle;">
<form id="form3" name="form2" method="post" action="cart.php">
          <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>" />
          <button type="image" name="imageField3"class="btn-lg bg-danger text-white " style="border:0px;" data-toggle="tooltip" data-placement="top"
                title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
              </button>
        </form>
</td>
</tr>    
<?php } ?>
<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
                            }
							}
							}
							?>

</tbody>
</table>


<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;"><strong>Total (peso)</strong></span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							 echo number_format($total, 2, ',', '.'); ?> $</strong>
							</li>



            </div> 
     
                <div class="col text-center">
                     <a type="button" class="btn btn-success my-4" href="../Carrito de compra paso 4/index.php">Continuar pedido</a>
                </div>
            </div>
           
      

       

    </div>
</div>
<!-- END vista C -->













<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>








