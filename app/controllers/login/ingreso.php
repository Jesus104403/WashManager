<?php
// 1. Incluimos la conexión a la base de datos
include('../../config.php');
session_start();

// 2. Recibimos los datos del formulario (AdminLTE)
$email = $_POST['email'];
$password_user = $_POST['password_user'];

// 3. Buscamos al usuario en la base de datos
$sql = "SELECT * FROM tb_usuarios WHERE email = :email";
$query = $pdo->prepare($sql);
$query->execute(['email' => $email]);

$usuario = $query->fetch(PDO::FETCH_ASSOC);

// 4. Verificamos si el usuario existe
if ($usuario) {
    // 4.1 Verificamos la contraseña encriptada
    if (password_verify($password_user, $usuario['password_user'])) {
        
        // --- CREDENCIALES CORRECTAS ---
        
        // Guardamos los datos en la sesión
        $_SESSION['sesion_email'] = $usuario['email'];
        $_SESSION['sesion_nombres'] = $usuario['nombres'];
        
        // Recuperamos el rol (si no tiene, asumimos 'cliente')
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'cliente';
        $_SESSION['sesion_rol'] = $rol;

        // --- LÓGICA DE REDIRECCIÓN POR ROL ---
        if ($rol == 'admin') {
            // Si es ADMIN, lo mandamos al Panel de Control (Listado de Lavados)
            header('Location: ' . $URL . '/index.php');
        } else {
            // Si es CLIENTE (o trabajador), lo mandamos a la Página Principal para agendar
            header('Location: ' . $URL . './WashManager/inicio.php');
        }
        exit();

    } else {
        // Contraseña incorrecta
        $_SESSION['mensaje'] = "Contraseña incorrecta, vuelva a intentarlo.";
        header('Location: ' . $URL . '/login/index.php');
        exit();
    }
} else {
    // Usuario no encontrado
    $_SESSION['mensaje'] = "El correo electrónico no existe en la base de datos.";
    header('Location: ' . $URL . '/login/index.php');
    exit();
}
?>