<?php
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
include('../database.php');

$consulta="SELECT*FROM usuario where user_name='$usuario' and password='$pass'";

$resultado=mysqli_query($conexion,$consulta);
//echo print_r($consulta);
$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location:pedidos.php");
}else{
    
    echo "ERROR DE AUTENTIFICACIÓN";
}

?>