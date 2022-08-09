<?php
include('config.php');

$id=$_GET["id"];

mysqli_query($conexion, "DELETE FROM `proveedores` where `id_proveedor` ='$id'")or die('error eliminar');
mysqli_close($conexion);
echo "<script>
alert('agricultor eliminado con exito');
window.location= 'mostar_adm_cli.php'
</script>";

?>