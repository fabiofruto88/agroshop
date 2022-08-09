<?php include("config.php");

$post = (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
        (isset($_POST['correo']) && !empty($_POST['correo'])) &&
        (isset($_POST['whast']) && !empty($_POST['whast'])) &&
        (isset($_POST['mensaje']) && !empty($_POST['mensaje']));


// Si $post es true (verdadero), entonces se insertaran los datos
if ( $post ) {
   
insertar($conexion);
}else {
  // Si en cambio, es false (falso), entonces volverá al formulario desde
  // donde se envió la petición:
//header("location:../index.html");
//echo '<script language="javascript">alert("POR FAVOR COMPLETE TODO LOS CAMPOS ");</script>';  
echo "<script>
                alert('POR FAVOR COMPLETE TODO LOS CAMPOS');
                window.location= '../index.html'
    </script>";
}



function insertar($conexion){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$whats=$_POST['whast'];
$mensaje=$_POST['mensaje'];
$consulta="INSERT INTO `contactos`( `nombre_contacto`, `correo`, `whats`, `mensaje`) VALUES ('$nombre','$correo','$whats','$mensaje') ";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

//header("location:../index.html");
//echo '<script language="javascript">alert(" se envio correctamente ");</script>';
echo "<script>
                alert('se envio correctamente pronto se te contactará');
                window.location= '../index.html'
    </script>";
}

?>