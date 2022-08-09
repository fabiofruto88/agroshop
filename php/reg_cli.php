 <?php
//$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 
include("config.php");

$post = (isset($_POST['nombre_cli']) && !empty($_POST['nombre_cli'])) &&
        (isset($_POST['num_id_cli']) && !empty($_POST['num_id_cli'])) &&
        (isset($_POST['tel_cli']) && !empty($_POST['tel_cli'])) &&
        (isset($_POST['direccion_c']) && !empty($_POST['direccion_c']))&&
        (isset($_POST['contraseña_cli']) && !empty($_POST['contraseña_cli']));


// Si $post es true (verdadero), entonces se mostrarán los resultados:
if ( $post ) {
   insertar($conexion);

}else {
    echo "<script>
    alert('POR FAVOR COMPLETE TODO LOS CAMPOS');
    window.location= '../html/cliente.html'
</script>";
 
}




function insertar($conexion){
    //obtener formulario

$nombre=$_POST['nombre_cli'];
$num_id=$_POST['num_id_cli'];
$telefono=$_POST['tel_cli'];
$direccion=$_POST['direccion_c'];
$contraseña=$_POST['contraseña_cli'];
$consulta = "INSERT INTO cliente VALUES ('$num_id','$nombre','$telefono','$direccion','$contraseña')";//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('registrado con exito');
               window.location= '../html/acceso_cliente.html'
    </script>";
//header("location:../html/acceso_cliente.html");
}


?> 