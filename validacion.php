<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

//Conectando a la BDD
$conexion=mysqli_connect("localhost","root","","biblioteca");
$consulta="SELECT * FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

//Validación de la BDD
$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location:home.php");
}else{
    echo("ERROR EN AUTENTICACIÓN");
};

mysqli_free_result($resultado);
mysqli_close($conexion);
?>