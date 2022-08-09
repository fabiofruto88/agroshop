<?php
include("config.php");
actualizar($conexion);


function actualizar($conexion){
    //obtener formulario

$codigo=$_POST['cod_prod'];    
$nombre=$_POST['prod'];
$precio=$_POST['precio'];

$peso=$_POST['peso'];
$ciudad=$_POST['ciudad'];
$departamento=$_POST['departamento'];

$descripcion=$_POST['descrip'];
$consulta = "UPDATE `producto` SET `nombre_prod`='$nombre',`precio`='$precio',`peso`='$peso',`cuidad`='$ciudad',`departamento`='$departamento',`descripcion`='$descripcion' WHERE `cod_producto`= '$codigo' ";
//se agg a la tabla
mysqli_query($conexion, $consulta);
mysqli_close($conexion);


echo "<script>
                alert('se actualizo correctamente');
                window.location= 'vista_agro.php'
    </script>";

}

?>