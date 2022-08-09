
<?php





require 'ct.php';
include("config.php");
$codd_venta=$_GET['id'];
$consulta="SELECT `cod_venta`, `id_cliente`, `id_prov`, `descuento`, `cod_producto`, `id_tr`, `fecha`, `cant`, `precio_uni`, `pre_trans`, `total`, `estado` FROM `venta` WHERE `cod_venta`='$codd_venta' ";
$resultado = mysqli_query($conexion, $consulta);
while ($mostrar = mysqli_fetch_array($resultado)) {
$codigo_venta= $mostrar['cod_venta'];
$identificacion_cliente = $mostrar['id_cliente'];
$identificacion_proveedor= $mostrar['id_prov'];
$codigo_producto=$mostrar['cod_producto'];
$descuento=$mostrar['descuento'];
$identificacion_transportador=$mostrar['id_tr'];
$fecha_venta=$mostrar['fecha'];
$cantidad=$mostrar['cant'];
$precio_uni=$mostrar['precio_uni'];
$precio_transporte=$mostrar['pre_trans'];
$total=$mostrar['total'];


} 
$consulta1=" SELECT * FROM `cliente` WHERE `id_cliente`=$identificacion_cliente";
$resultado1 = mysqli_query($conexion, $consulta1);
while ($mostrar1 = mysqli_fetch_array($resultado1)) {
    $nombre_Cliente=$mostrar1['Nombre'];
    $telefono_cliente=$mostrar1['telefono'];
    $dir_cliente=$mostrar1['direccionc'];
}

$consulta2="SELECT * FROM `proveedores` WHERE `id_proveedor` ='$identificacion_proveedor'";
$resultado2 = mysqli_query($conexion, $consulta2);
while ($mostrar2 = mysqli_fetch_array($resultado2)) {
    $nombre_proveedor=$mostrar2['nombre_proveedor'];
    $telefono_proveedor=$mostrar2['telefono'];
    $dir_proveedor=$mostrar2['direccion'];
}

$consulta3="SELECT * FROM `transportador` WHERE `id_trans`= '$identificacion_transportador'";
$resultado3 = mysqli_query($conexion, $consulta3);
while ($mostrar3 = mysqli_fetch_array($resultado3)) {
    $nombre_transportador=$mostrar3['nombre'];
    $telefono_transportador=$mostrar3['telefono'];
    $dir_transportador=$mostrar3['direccion'];
}


ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css"> 
  
  <title>factura</title>
</head>

<body>

  <div class="container">
    <div class="row1">
        <div class="infofac">
             <h1>factura de venta</h1>

        <h4>codigo de la factura: <?php echo $codigo_venta ?></h4>
        <p>fecha: <?php echo " ". $fecha_venta ?> </p>
        </div>
   
    </div>
    <div class="row">
        <div class="coll">
            <h3>TU AGRO SHOP</h3>
            
        </div>
    </div>
    <div class="row">
    <table class="table" frame="void">
  <thead>
    <tr>
   
    </tr>
  </thead>
  <tr class="thh">
      <th scope="col">aaaaa</th>
      <th scope="col">aaaaaaaaaaaaaaaaaaaaaaaaa</th>
      
      
      
      <th scope="col">aaaaaaaaaaaaaaaaaaaaaaaaa</th>
      
      
      <th scope="col">aaaaaaaaaaaaaaaaaaaaaaaa</th>
     
    </tr>
  <tbody >
    <tr class="z">
      <td></td>
      <td></td>
      <th>informacion usuarios</th>
      <td></td>
    </tr>
    <tr>
    <td></td>
      <td><p>vendedor: <?php echo " ". $identificacion_proveedor ." " .$nombre_proveedor?>  <p>telefono: <?php echo " ". $telefono_proveedor ?></p>
            <p>direccion: <?php echo " ". $dir_proveedor ?></p></p></td>
      <td> <p>cliente:<?php echo " ". $identificacion_cliente . " " .$nombre_Cliente ?>  </p>
            <p>telefono: <?php echo " ". $telefono_cliente ?>  </p>
            <p>direccion: <?php echo " ". $dir_cliente ?>  </p></td>
      <td><p>transportador:  <?php echo " ". $identificacion_transportador ." ". $nombre_transportador ?>  </p>
                <p>telefono: <?php echo " ". $telefono_transportador ?></p></td>
    </tr>
    <tr>
    <td></td>
      <td colspan="2"></td>
     
    </tr>
    <tr>
    <td></td>

     
   </tr>
   <tr>
   <td></td>
     
     
    </tr>
    <tr>
    <td></td>
     
      
    </tr>
    

    
  </tbody>
</table>

<table class="table2">
  <thead class="a">
    <tr>
      <th scope="col">codigo del producto</th>
      <th scope="col">descuento %</th>
      <th scope="col">cantidad de producto</th>
      <th scope="col">precio unitario</th>
      <th>precio envio</th>
      <th>precio final</th>
    </tr>
  </thead>
  <tbody class="b">
    <tr>
      <td> <?php echo " ". $codigo_producto ?></td>
      <td><?php echo " ". $descuento ?></td>
      <td> <?php echo " ". $cantidad . " ". " und "?></td>
      <td><?php  echo " ". MONEDA . number_format( $precio_uni, 2, ',', '.') ?></td>
      <td><?php echo " ". MONEDA . number_format($precio_transporte, 2, ',', '.') ?></td>
      <td><?php echo " ". MONEDA . number_format( $total, 2, ',', '.') ?></td>
      
    </tr>
    </tbody>
</table>    

       
            <div class="gracias">
              <br><br><br>   <br><br><br>   <br><br><br>   <br><br><br>
                <p class="text-center">*iva incluido en el precio unitario del producto (19%)*</p>
                <p class="text-center">!Gracias por apoyar el campo colombiano al usar TU AGRO SHOP!</p>
         
        </div>
    
  </div>




  

  <style>
    body{
        border: 1px solid black;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
     
    }
.row1{
    border-bottom: 1px solid black;
    border-top: 1px solid black;
}
.infofac{
    padding: 2rem;
}
.coll{
    text-align: center;
    border-bottom: 1px solid black;
    border-top: 1px solid black;
}
.table{
    border-bottom: 1px solid black;
   
   
}
.thh{
 color: white;
}
.tbody{
    border-bottom: 1px solid black;
}
.table2{
    text-align: center;
 
    margin-top: 1rem;
    padding: 1rem;
}

.table2 th{
    border: 1px solid black;
}
.b{
    border: 1px solid black;
}
.gracias{
    text-align: center;
}
  </style>

</body>



</html>
<?php


$html = ob_get_clean();


// echo $html;
require '../libs/dompdf/vendor/autoload.php';
require_once '../libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

use Dompdf\Options;
   

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setDefaultFont('Arial');
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);







$dompdf->loadHtml($html);
$dompdf->setPaper('letter','portrait');
$dompdf->render();

$dompdf->stream("factura.pdf", array("attachment"=>false));

echo $dompdf->output();

?>