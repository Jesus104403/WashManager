<?php
include('../../config.php');
session_start();

if ($_POST) {
    // 1. Recogemos los datos del formulario
    $nombre_cliente = $_POST['nombre_cliente'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tipo_vehiculo = $_POST['tipo_vehiculo'];
    $nombre_servicio = $_POST['nombre_servicio'];
    $sucursal = $_POST['sucursal'];
    $fecha_cita = $_POST['fecha_cita'];
    $hora_cita = $_POST['hora_cita'];
    $precio_original = $_POST['precio_original'];
    $cupon = $_POST['cupon'];
    $precio_final = $_POST['precio_final'];

    // 2. Generamos la fecha de creación automática
    $fecha_creacion = date('Y-m-d H:i:s'); 

    try {
        // 3. Preparamos la sentencia SQL INSERT
        $sql_insert = "INSERT INTO citas 
            (nombre_cliente, email, telefono, tipo_vehiculo, nombre_servicio, sucursal, fecha_cita, hora_cita, precio_original, cupon, precio_final, fecha_creacion) 
            VALUES 
            (:nombre_cliente, :email, :telefono, :tipo_vehiculo, :nombre_servicio, :sucursal, :fecha_cita, :hora_cita, :precio_original, :cupon, :precio_final, :fecha_creacion)";

        $sentencia = $pdo->prepare($sql_insert);

        // 4. Asignamos los valores
        $sentencia->bindParam(':nombre_cliente', $nombre_cliente);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':tipo_vehiculo', $tipo_vehiculo);
        $sentencia->bindParam(':nombre_servicio', $nombre_servicio);
        $sentencia->bindParam(':sucursal', $sucursal);
        $sentencia->bindParam(':fecha_cita', $fecha_cita);
        $sentencia->bindParam(':hora_cita', $hora_cita);
        $sentencia->bindParam(':precio_original', $precio_original);
        $sentencia->bindParam(':cupon', $cupon);
        $sentencia->bindParam(':precio_final', $precio_final);
        $sentencia->bindParam(':fecha_creacion', $fecha_creacion);

        // 5. Ejecutamos
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "La cita se registró correctamente";
            $_SESSION['icono'] = "success"; // Opcional para alertas
            // Redirigimos al listado
            header("Location: " . $URL . "/usuarios/show_lavados.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al registrar la cita";
            $_SESSION['icono'] = "error";
            header("Location: " . $URL . "/usuarios/create_cita.php");
            exit();
        }

    } catch (PDOException $e) {
        // En caso de error de BD
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        header("Location: " . $URL . "/usuarios/create_cita.php");
        exit();
    }

} else {
    // Acceso directo no permitido
    header("Location: " . $URL . "/usuarios/create_cita.php");
    exit();
}
?>