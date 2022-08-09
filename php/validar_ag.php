<?php
//include('config.php');
$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));
$usuario=$_POST['usuario_ag'];
$contra=$_POST['passwor_ag'];
session_start();
$_SESSION['usuario']=$usuario;



$consulta="SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores`  where `id_proveedor` ='$usuario' and  `password` ='$contra' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas) {
    header("location:../php/vista_agro.php");

}else{
    
    
    echo '<script language="javascript">alert("Error de auntenticacion");</script>';
    include("../html/accceso_agricultor.html");

}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>