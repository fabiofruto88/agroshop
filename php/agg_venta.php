<?php
//$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 
session_start();
$sesion= $_SESSION['usuario'];
if ($sesion== null|| $sesion== '') {
    echo 'no tiene acceso';
    die();
  }
  date_default_timezone_set('America/Bogota');
include("config.php");
$idproducto=$_POST['idproducto'];
$cons="SELECT `cod_producto`, `precio` FROM `producto` where `cod_producto`='$idproducto'";
$resul = mysqli_query($conexion, $cons);
while ($mostar = mysqli_fetch_array($resul)) {
    $precio_pr=$mostar['precio']; 
}

$post = (isset($_POST['idcliente']) && !empty($_POST['idcliente'])) &&
        (isset($_POST['idproducto']) && !empty($_POST['idproducto'])) &&
        (isset($_POST['descuento']) && !empty($_POST['descuento'])) &&
        (isset($_POST['cant']) && !empty($_POST['cant']))&&
        (isset($_POST['envio']) && !empty($_POST['envio']))&&
        (isset($_POST['idtrr']) && !empty($_POST['idtrr']));


// Si $post es true (verdadero), entonces se mostrarán los resultados:
if ( $post ) {
   insertar($conexion,$sesion,$precio_pr);

}else {
    echo "<script>
    alert('POR FAVOR COMPLETE TODO LOS CAMPOS');
    window.location= 'report_ped_agr.php'
</script>";
 
}



function insertar($conexion,$sesion,$precio_pr){
    //obtener formulario

$idcliente=$_POST['idcliente'];
$idproducto=$_POST['idproducto'];
$descuento=$_POST['descuento'];
$envio=$_POST['envio'];

$cant=$_POST['cant'];
$pre=$precio_pr;
$idtransportador=$_POST['idtrr'];
$id_prov=$sesion;
$des=$descuento/100;
$valor=($cant*$pre);
$desf=$des*$valor;
$total=$valor-$desf+$envio;

$estado='pendiente';
$hoy = date("Y-m-d H:i:s"); 
$consulta=" INSERT INTO `venta`( `id_cliente`, `id_prov`, `descuento`, `cod_producto`, `id_tr`, `fecha`, `cant`, `precio_uni`, `pre_trans`, `total`, `estado`) VALUES ('$idcliente','$id_prov','$descuento','$idproducto','$idtransportador','$hoy','$cant','$precio_pr','$envio','$total','$estado')";

mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('venta agregada con exito');
               window.location= 'report_ped_agr.php'
    </script>";
//header("location:../html/accceso_agricultor.html");

}
//

?> 