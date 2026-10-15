<?php 

// 1. Incluir config y Iniciar sesión al principio
include ('../../config.php');
session_start();

// 2. Recoger todas las variables
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeet = $_POST['password_repeet'];
$id_usuaros = $_POST['id_usuaros'];

// Asumo que $fechahora se define en tu 'config.php'
// $fyh_creacion = $fechahora; // Esta línea no se usaba

// 3. Esta es tu lógica original:
// Si las contraseñas coinciden (incluso si ambas están vacías)
if ($password_user == $password_repeet) {
    
    // Hasheamos la contraseña.
    // (Ten cuidado: si ambas están vacías, se guardará un hash de "nada")
    $password_user_hashed = password_hash($password_user, PASSWORD_BCRYPT);

    // 4. CORRECCIÓN SQL:
    // Se ha corregido la sintaxis: 'fyh_actualizacion = :fyh_actualizacion'
    $sentencia = $pdo ->prepare ("UPDATE tb_usuarios SET 
        nombres=:nombres, 
        email=:email, 
        password_user=:password_user, 
        fyh_actualizacion=:fyh_actualizacion 
        WHERE id_usuaros=:id_usuaros");

    $sentencia -> bindParam (':nombres', $nombres);
    $sentencia -> bindParam (':email', $email);
    $sentencia -> bindParam (':password_user', $password_user_hashed); // Usamos la variable hasheada
    $sentencia -> bindParam (':fyh_actualizacion', $fechahora );
    
    // 5. CORRECCIÓN DE VARIABLE:
    // Se usa $id_usuaros (la variable correcta) en lugar de $id_usuaro
    $sentencia -> bindParam (':id_usuaros', $id_usuaros);
    $sentencia -> execute();
    
    $_SESSION['mensaje'] = "se actualizó el usuario correctamente";
    header("Location: " . $URL . "/usuarios/");
    exit(); // Añadido exit()


}else {
    // Si las contraseñas no coinciden
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    
    // 6. CORRECCIÓN DE REDIRECT:
    // Te devolvemos al formulario de update CON el ID, 
    // para que la página de edición pueda cargar los datos.
    header("Location: " . $URL . "/usuarios/update.php?id=" . $id_usuaros);
    exit(); // Añadido exit()

}