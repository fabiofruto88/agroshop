<?php
//include('config.php');
$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));
$usuario=$_POST['id'];
$contra=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;



$consulta="SELECT `id_adm`, `nombre`, `password` FROM `administrador` where `id_adm` ='$usuario' and  `password` ='$contra' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas) {
    header("location:vista_admin.php");

}else{
    
    include("../html/acceso_admin.html");
    echo "<script>
    alert('error de autenticacion');
    window.location= '../index.html'
</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>