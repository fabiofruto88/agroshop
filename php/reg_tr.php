<?php
//$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 
include("config.php");

$post = (isset($_POST['nombre_tr']) && !empty($_POST['nombre_tr'])) &&
        (isset($_POST['num_id_tr']) && !empty($_POST['num_id_tr'])) &&
        (isset($_POST['t_id_tr']) && !empty($_POST['t_id_tr'])) &&
        (isset($_POST['tel_tr']) && !empty($_POST['tel_tr']))&&
        (isset($_POST['direccion_tr']) && !empty($_POST['direccion_tr']))&&
        (isset($_POST['contraseña_tr']) && !empty($_POST['contraseña_tr']));


// Si $post es true (verdadero), entonces se mostrarán los resultados:
if ( $post ) {
   insertar($conexion);

}else {
    echo "<script>
    alert('POR FAVOR COMPLETE TODO LOS CAMPOS');
    window.location= '../html/transportador.html'
</script>";
 
}




function insertar($conexion){
    //obtener formulario

$nombre=$_POST['nombre_tr'];
$num_id=$_POST['num_id_tr'];
$tipo_id_tr=$_POST['t_id_tr'];
$telefono=$_POST['tel_tr'];
$direccion=$_POST['direccion_tr'];
$contraseña=$_POST['contraseña_tr'];
$consulta = "INSERT INTO `transportador` VALUES ('$nombre','$num_id','$tipo_id_tr','$contraseña','$telefono','$direccion','activo')";//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('registrado con exito');
               window.location= '../html/acceso_transp.html'
    </script>";
//header("location:../html/acceso_transp.html");
}


?> 