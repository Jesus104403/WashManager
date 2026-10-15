<?php 

// Inicializamos variables vacías para evitar errores de "Undefined variable"
$nombre_cliente = "";
$email = "";
$telefono = "";
$tipo_vehiculo = "";
$tipo_servicio_id = "";
$nombre_servicio = "";
$fecha_cita = "";
$hora_cita = "";
$sucursal = "";
$cupon = "";
$precio_original = "";
$precio_final = "";
$fecha_creacion = "";

// Verificamos si existe el ID en la URL
if (isset($_GET['id'])) {
    $id_cita_get = $_GET['id'];

    // Verificamos que $pdo exista (conexión a BD)
    if (!isset($pdo)) {
        echo "<div class='alert alert-danger'>Error: No hay conexión a la base de datos ($pdo no existe). Revisa config.php</div>";
    } else {
        try {
            // Preparamos la consulta SQL
            $sql_citas = "SELECT * FROM citas WHERE id = :id_parametro";
            $query_citas = $pdo->prepare($sql_citas);
            $query_citas->execute(['id_parametro' => $id_cita_get]);
            
            $cita_dato = $query_citas->fetch(PDO::FETCH_ASSOC);

            if ($cita_dato) {
                // Asignamos las variables si encontramos datos
                $nombre_cliente = $cita_dato['nombre_cliente']; 
                $email = $cita_dato['email'];
                $telefono = $cita_dato['telefono'];
                $tipo_vehiculo = $cita_dato['tipo_vehiculo'];
                $tipo_servicio_id = $cita_dato['tipo_servicio_id'];
                $nombre_servicio = $cita_dato['nombre_servicio'];
                $fecha_cita = $cita_dato['fecha_cita'];
                $hora_cita = $cita_dato['hora_cita'];
                $sucursal = $cita_dato['sucursal'];
                $cupon = $cita_dato['cupon'];
                $precio_original = $cita_dato['precio_original'];
                $precio_final = $cita_dato['precio_final'];
                $fecha_creacion = $cita_dato['fecha_creacion']; 
            } else {
                // Si el ID no existe en la BD
                echo "<script>console.error('No se encontró ninguna cita con el ID: " . $id_cita_get . "');</script>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error en la consulta SQL: " . $e->getMessage() . "</div>";
        }
    }
} else {
    // Si no viene el ID en la URL
    echo "<script>console.warn('No se recibió ningún ID en la URL (ej. show_cita.php?id=1)');</script>";
}
?>