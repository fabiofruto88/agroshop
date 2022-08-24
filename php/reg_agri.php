<?php
//$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 
include("config.php");


$post = (isset($_POST['nombre_ag']) && !empty($_POST['nombre_ag'])) &&
        (isset($_POST['id_ag']) && !empty($_POST['id_ag'])) &&
        (isset($_POST['t_id_ag']) && !empty($_POST['t_id_ag'])) &&
        (isset($_POST['tel_ag']) && !empty($_POST['tel_ag']))&&
        (isset($_POST['lugar_ag']) && !empty($_POST['lugar_ag']))&&
        (isset($_POST['contra_ag']) && !empty($_POST['contra_ag']));


// Si $post es true (verdadero), entonces se mostrarán los resultados:
if ( $post ) {
   insertar($conexion);

}else {
    echo "<script>
    alert('POR FAVOR COMPLETE TODO LOS CAMPOS');
    window.location= '../html/agricultor.html'
</script>";
 
}

function insertar($conexion){
    //obtener formulario

$nombre=$_POST['nombre_ag'];
$num_id=$_POST['id_ag'];
$tipo_id_ag=$_POST['t_id_ag'];
$telefono=$_POST['tel_ag'];
$direccion=$_POST['lugar_ag'];
$contraseña=$_POST['contra_ag'];

$consulta = "INSERT INTO `proveedores` (`nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion`, `estado`) VALUES ('$nombre','$num_id','$tipo_id_ag','$contraseña','$telefono','$direccion', 'activo' )";//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('registrado con exito');
               window.location= '../html/accceso_agricultor.html'
    </script>";
//header("location:../html/accceso_agricultor.html");

}
//

?> 