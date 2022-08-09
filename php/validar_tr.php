<?php
include("config.php");

$usuario=$_POST['usuario_tr'];
$contra=$_POST['passwor_tr'];
session_start();

$_SESSION['usuario']=$usuario;


$consulta="SELECT `nombre`, `id_trans`, `tipo_id`, `password`, `telefono`, `direccion` FROM `transportador` where `id_trans` ='$usuario' and  `password` ='$contra' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas) {
    header("location:report_ped_tr.php");

}else{
    
    include("../html/acceso_transp.html");
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