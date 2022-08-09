<?php
include("config.php");
$id=$_GET['id'];


mysqli_query($conexion, "DELETE FROM `cliente` where `id_cliente` ='$id' ")or die('error eliminar');
mysqli_close($conexion);
echo "<script>
alert('cliente eliminado');
window.location= 'mostar_adm_cli.php'
</script>";

?>