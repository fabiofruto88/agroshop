<?php
include("config.php");


$usuario=$_POST['usuario_l_cli'];
$contra=$_POST['contraseña_l_cli'];
session_start();

$_SESSION['usuario']=$usuario;



$consulta="SELECT `id_cliente`, `Nombre`, `telefono`, `direccionc`, `passw` FROM cliente where `id_cliente` ='$usuario' and  `passw` ='$contra' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas) {
    header("location:../php/report_cli.php");
    
}else{
    
    include("../html/acceso_cliente.html");
     ?>
     <script type="text/javascript">
      Alert("error de aunteticacion");
     </script>
     <h1> error autenticacion</h1>
     <?php

}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>