<?php 

//$server="localhost";
//$user="root";
//$pass="";
//$db="proyecto";
//
//$cx=mysqli_connect($server,$user,$pass,$db);

$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 

?>


