<?php
include('config.php');
$id=$_POST['id'];
$nombre=$_POST['nom'];
$t_id=$_POST['t_id'];
$telefono=$_POST['tel'];
$direc=$_POST['dir'];
$contra=$_POST['pass'];
$estado=$_POST['estado'];

mysqli_query($conexion," UPDATE `transportador` SET `nombre`='$nombre',`tipo_id`='$t_id',`password`='$contra',`telefono`='$telefono',`direccion`='$direc' , `estado`='$estado' WHERE `id_trans`='$id'")or die("error de actualizar");
mysqli_close($conexion);
header("location:mostar_adm_cli.php");
?>