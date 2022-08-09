<?php
include("config.php");
actualizar($conexion);
function actualizar($conexion){
$estado=$_POST['estado'];
$codventa=$_POST['mod'];
$consulta = "UPDATE `venta` SET `estado`='$estado' WHERE `cod_venta`='$codventa' ";
//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('estado modificado');
                window.location= 'report_ped_tr.php'
    </script>";

}
?>