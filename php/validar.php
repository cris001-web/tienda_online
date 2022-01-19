<?php
$usuario=$_POST['usuario'];
$password=$_POST['pass'];
session_start();
$_SESSION['usuario']=$usuario;
include('../database.php');

$consulta="SELECT*FROM usuario where user_name='$usuario' and password='$password'";
var_dump($consulta);
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
echo $filas;
if($filas>0){
    header("location:../index.php");
}else{
    
    echo "<h3>ERROR DE AUTENTICACIÓN</h3>";
}
?>