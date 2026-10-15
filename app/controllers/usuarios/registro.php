<?php
// Incluimos la configuración
include('../../config.php');

// Recibimos los datos
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

// --- CORRECCIÓN IMPRESCINDIBLE ---
// Definimos la fecha y hora actual antes de usarla
date_default_timezone_set("America/Mexico_City"); // Cambia esto a tu zona horaria si es necesario
$fechaHora = date('Y-m-d H:i:s');
// ---------------------------------

session_start(); 

if ($password_user == $password_repeat) {
    
    // Validar si el correo ya existe
    $sentencia_verificar = $pdo->prepare("SELECT email FROM tb_usuarios WHERE email = :email");
    $sentencia_verificar->bindParam(':email', $email);
    $sentencia_verificar->execute();
    
    if($sentencia_verificar->rowCount() > 0){
        $_SESSION['mensaje'] = "Este correo ya está registrado";
        $_SESSION['icono'] = "error";
        // Ajusta la ruta de regreso a tu formulario
        header('Location: ../../../usuarios/registro.php');
        exit;
    }

    $password_user = password_hash($password_user, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
            (nombres, email, password_user, fyh_creacion, fyh_actualizacion) 
    VALUES (:nombres, :email, :password_user, :fyh_creacion, :fyh_actualizacion)");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('password_user', $password_user);
    // Ahora $fechaHora SI tiene valor
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);

    if($sentencia->execute()){
        $_SESSION['mensaje'] = "Registro exitoso. Por favor inicie sesión.";
        $_SESSION['icono'] = "success";
        header('Location: ../../../login/index.php'); 
    }else{
        $_SESSION['mensaje'] = "Error al registrar el usuario";
        $_SESSION['icono'] = "error";
        header('Location: ../../../usuarios/registro.php');
    }

} else {
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location: ../../../usuarios/registro.php');
}
?>