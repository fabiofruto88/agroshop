<?php
$conexion = mysqli_connect('localhost', 'root','', 'proyecto') or die(mysqli_error($mysqli));//se conecta a la BD 
eliminar($conexion);


function eliminar($conexion){
    //obtener formulario

$codigo=$_POST['cod_prod'];

$consultae = "DELETE FROM `producto` WHERE `cod_producto`= '$codigo' ";
//se agg a la tabla
//mysqli_query($conexion, $consulta);
mysqli_query($conexion, $consultae);

mysqli_close($conexion);


    
     
  
     echo "<script>
                alert('se eliminó correctamente);
                window.location= 'elim_pr_admhtml.php'
    </script>";
    include("elim_pr_admhtml.php");
     

}

?>