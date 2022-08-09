<?php
include('config.php');

$id=$_GET['id'];

mysqli_query($conexion, "DELETE FROM `transportador` where `id_trans`  ='$id'")or die('error eliminar');
mysqli_close($conexion);

echo "<script>
alert('transportador eliminado con exito');
window.location= 'mostar_adm_cli.php'
</script>";
?>