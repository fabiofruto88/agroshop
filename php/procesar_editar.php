<?php
include('config.php');
$id=$_POST['id'];
$nombre=$_POST['nom'];
$telefono=$_POST['tel'];
$direc=$_POST['dir'];
$contra=$_POST['pass'];
$estado=$_POST['estado'];

mysqli_query($conexion,"UPDATE `cliente` SET `Nombre`='$nombre',`telefono`='$telefono',`direccionc`='$direc',`passw`='$contra', `estado`='$estado' WHERE `id_cliente`='$id' ")or die("error de actualizar");
mysqli_close($conexion);
header("location:mostar_adm_cli.php");
?>