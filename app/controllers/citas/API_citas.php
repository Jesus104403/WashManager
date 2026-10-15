<?php
// api_citas.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../../config.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo);
        break;
    case 'PUT':
        handlePut($pdo);
        break;
    case 'DELETE':
        handleDelete($pdo);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        break;
}

// --- FUNCIÓN LEER (GET) ---
function handleGet($pdo) {
    try {
        if (isset($_GET['id'])) {
            // Obtener una sola cita por ID
            $sql = "SELECT * FROM citas WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_GET['id']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Obtener todas las citas
            $sql = "SELECT * FROM citas ORDER BY fecha_creacion DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

// --- FUNCIÓN CREAR (POST) ---
function handlePost($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);

    try {
        // La consulta SQL coincide con las columnas de tu imagen
        $sql = "INSERT INTO citas (nombre_cliente, email, telefono, tipo_vehiculo, tipo_servicio_id, nombre_servicio, fecha_cita, hora_cita, sucursal, cupon, precio_original, precio_final) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['nombre_cliente'],
            $data['email'],
            $data['telefono'],
            $data['tipo_vehiculo'],
            $data['tipo_servicio_id'], // ej: 'completo'
            $data['nombre_servicio'],  // ej: 'Lavado Completo Deluxe'
            $data['fecha_cita'],       // YYYY-MM-DD
            $data['hora_cita'],        // HH:MM:SS
            $data['sucursal'],
            $data['cupon'] ?? '',      // Si no hay cupón, envía vacío
            $data['precio_original'],
            $data['precio_final']
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Cita creada correctamente', 'id' => $pdo->lastInsertId()]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al crear: ' . $e->getMessage()]);
    }
}

// --- FUNCIÓN ACTUALIZAR (PUT) ---
function handlePut($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['id'])) {
        echo json_encode(['status' => 'error', 'message' => 'ID es requerido para actualizar']);
        return;
    }

    try {
        // Actualiza todos los campos editables basados en tu tabla
        $sql = "UPDATE citas SET 
                    nombre_cliente = ?, 
                    email = ?, 
                    telefono = ?, 
                    tipo_vehiculo = ?, 
                    tipo_servicio_id = ?, 
                    nombre_servicio = ?, 
                    fecha_cita = ?, 
                    hora_cita = ?, 
                    sucursal = ?, 
                    cupon = ?, 
                    precio_original = ?, 
                    precio_final = ?,
                    fecha_actualizacion = NOW() 
                WHERE id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['nombre_cliente'],
            $data['email'],
            $data['telefono'],
            $data['tipo_vehiculo'],
            $data['tipo_servicio_id'],
            $data['nombre_servicio'],
            $data['fecha_cita'],
            $data['hora_cita'],
            $data['sucursal'],
            $data['cupon'],
            $data['precio_original'],
            $data['precio_final'],
            $data['id']
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Cita actualizada correctamente']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar: ' . $e->getMessage()]);
    }
}

// --- FUNCIÓN BORRAR (DELETE) ---
function handleDelete($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Acepta el ID ya sea por JSON body o por URL param
    $id = $data['id'] ?? $_GET['id'] ?? null;

    if (!$id) {
        echo json_encode(['status' => 'error', 'message' => 'ID es requerido para eliminar']);
        return;
    }

    try {
        $sql = "DELETE FROM citas WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        echo json_encode(['status' => 'success', 'message' => 'Cita eliminada correctamente']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar: ' . $e->getMessage()]);
    }
}
?>