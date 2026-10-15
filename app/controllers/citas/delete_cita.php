<?php
include('../../config.php');
session_start();

// Verificamos que se haya enviado el formulario (método POST)
if ($_POST) {
    $id_cita = $_POST['id_cita'];

    try {
        // Preparamos la sentencia SQL para borrar
        $sentencia = $pdo->prepare("DELETE FROM citas WHERE id = :id_cita");
        $sentencia->bindParam(':id_cita', $id_cita);

        // Ejecutamos
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "La cita se eliminó correctamente de la base de datos";
            $_SESSION['icono'] = "success"; // Opcional: para SweetAlert
            header("Location: " . $URL . "/usuarios/show_lavados.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error: No se pudo eliminar la cita";
            $_SESSION['icono'] = "error";
            header("Location: " . $URL . "/usuarios/show_lavados.php");
            exit();
        }

    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        header("Location: " . $URL . "/usuarios/show_lavados.php");
        exit();
    }
} else {
    // Si intentan entrar directo sin enviar el formulario
    header("Location: " . $URL . "/usuarios/show_lavados.php");
    exit();
}
?>