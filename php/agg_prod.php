<?php
session_start();
$sesion= $_SESSION['usuario'];
include("config.php");



$consulta="SELECT `nombre_proveedor`, `id_proveedor`, `tipo_id`, `password`, `telefono`, `direccion` FROM `proveedores` WHERE `id_proveedor` ='$sesion' ";
$resultado= mysqli_query($conexion, $consulta);
while ($mostar = mysqli_fetch_array($resultado)) {
   $nombre_prov=  $mostar['nombre_proveedor'];
   $id_proveedor =$mostar['id_proveedor'];
   $tel_prov = $mostar['telefono'];
}
insertar($conexion, $tel_prov, $nombre_prov, $id_proveedor);


function insertar($conexion, $tel_prov, $nombre_prov, $id_proveedor){
    //obtener formulario

$nombre=$_POST['prod'];
$precio=$_POST['precio'];
$tipo_pro=$_POST['t_pro'];
$peso=$_POST['peso'];
$ciudad=$_POST['ciudad'];
$departamento=$_POST['departamento'];
$img= addslashes(file_get_contents($_FILES['img']['tmp_name']));
$descripcion=$_POST['descrip'];
$consulta = "INSERT INTO producto ( `nombre_prod`, `precio`, `tipo_de_producto`, `peso`, `cuidad`, `departamento`, `img`, `descripcion`, `id_proveedor`) VALUES (  '$nombre','$precio','$tipo_pro','$peso','$ciudad','$departamento','$img','$descripcion',  '$id_proveedor')";
//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);
echo "<script>
                alert('Producto agregado con exito');
                window.location= 'vista_agro.php'
    </script>";
}

?>