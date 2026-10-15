<?php
include('../../config.php');
session_start();

if ($_POST) {
    // 1. Recogemos el ID (Oculto en el formulario)
    $id_cita = $_POST['id_cita'];

    // 2. Recogemos el resto de datos del formulario
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

    // Opcional: Actualizar fecha de actualización
    $fyh_actualizacion = date('Y-m-d H:i:s'); 

    try {
        // 3. Preparamos la sentencia SQL UPDATE
        $sql_update = "UPDATE citas SET 
            nombre_cliente = :nombre_cliente,
            email = :email,
            telefono = :telefono,
            tipo_vehiculo = :tipo_vehiculo,
            nombre_servicio = :nombre_servicio,
            sucursal = :sucursal,
            fecha_cita = :fecha_cita,
            hora_cita = :hora_cita,
            precio_original = :precio_original,
            cupon = :cupon,
            precio_final = :precio_final,
            fecha_actualizacion = :fecha_actualizacion 
            WHERE id = :id_cita";

        $sentencia = $pdo->prepare($sql_update);

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
        $sentencia->bindParam(':fecha_actualizacion', $fyh_actualizacion);
        $sentencia->bindParam(':id_cita', $id_cita);

        // 5. Ejecutamos
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "La cita se actualizó correctamente";
            // Redirigimos al listado
            header("Location: " . $URL . "/usuarios/show_lavados.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al actualizar la cita";
            header("Location: " . $URL . "/citas/update_cita.php?id=" . $id_cita);
            exit();
        }

    } catch (PDOException $e) {
        // En caso de error de BD
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        header("Location: " . $URL . "/citas/update_cita.php?id=" . $id_cita);
        exit();
    }

} else {
    // Acceso directo no permitido
    header("Location: " . $URL . "/usuarios/show_lavados.php");
    exit();
}
?>