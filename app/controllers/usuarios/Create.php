<?php 

include ('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeet = $_POST['password_repeet'];
$fyh_creacion = $fechahora;
if ($password_user == $password_repeet) {
    $password_user = password_hash($password_user, PASSWORD_BCRYPT);



$sentencia = $pdo ->prepare ("INSERT INTO tb_usuarios 
(nombres, email, password_user,fyh_creacion) VALUES ( :nombres, :email, :password_user,:fyh_creacion);");

$sentencia -> bindParam (':nombres', $nombres);
$sentencia -> bindParam (':email', $email);
$sentencia -> bindParam (':password_user', $password_user);
$sentencia -> bindParam (':fyh_creacion', $fechahora );
$sentencia -> execute();
  session_start();
  $_SESSION['mensaje'] = "Las contraseñas no coinciden";
  header("Location: " . $URL . "/usuarios/");


}else {
    session_start();
  $_SESSION['mensaje'] = "Las contraseñas no coinciden";
  header("Location: " . $URL . "/usuarios/create.php");

}