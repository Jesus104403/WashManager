<?php
// controlador_citas.php
// Este es el "Controlador" que procesa el formulario.

session_start();
include '../../config.php'; // Incluye tu conexión $pdo

// --- Copia los datos de los servicios para validar precios ---
// (En un sistema real, esto vendría de la BD, pero seguimos tu lógica)
$services = [
    ["id" => "basico", "name" => "Lavado Básico", "price" => 299, "duration" => "30 min"],
    ["id" => "premium", "name" => "Lavado Premium", "price" => 499, "duration" => "60 min"],
    ["id" => "completo", "name" => "Lavado Completo Deluxe", "price" => 799, "duration" => "90 min"],
    ["id" => "express", "name" => "Lavado Express", "price" => 199, "duration" => "15 min"],
    ["id" => "interior", "name" => "Detallado Interior", "price" => 599, "duration" => "120 min"],
    ["id" => "exterior", "name" => "Detallado Exterior", "price" => 699, "duration" => "120 min"],
];

function findServiceById($services, $id) {
    foreach ($services as $service) {
        if ($service['id'] === $id) return $service;
    }
    return null;
}

// 1. Verificar que se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_booking'])) {

    // 2. Recibir TODOS los datos del formulario
    $tipo_vehiculo = $_POST['tipo_vehiculo'] ?? '';
    $tipo_servicio_id = $_POST['tipo_servicio'] ?? '';
    $fecha = $_POST['date'] ?? '';
    $hora = $_POST['time'] ?? '';
    $cupon_code = trim(strtoupper($_POST['coupon_code'] ?? ''));
    $nombre_cliente = $_POST['nombres'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    // 3. Validar datos (simple)
    if (empty($tipo_vehiculo) || empty($tipo_servicio_id) || empty($fecha) || empty($hora) || empty($sucursal) || empty($nombre_cliente) || empty($email) || empty($telefono)) {
        $_SESSION['error_message'] = "Por favor, completa todos los campos marcados con *";
        header("Location: Agendar_Cita.php"); // Volver al formulario
        exit;
    }

    // 4. Lógica de negocio (Calcular precio y cupón en el servidor)
    $selectedService = findServiceById($services, $tipo_servicio_id);
    if (!$selectedService) {
        $_SESSION['error_message'] = "El servicio seleccionado no es válido.";
        header("Location: Agendar_Cita.php");
        exit;
    }

    $precio_original = $selectedService['price'];
    $nombre_servicio = $selectedService['name'];
    $discount = 0;
    $final_price = $precio_original;

    // Lógica de cupón (copiada de tu archivo)
    if ($cupon_code == 'KOALA15' && $tipo_servicio_id == 'premium') {
        $discount = $precio_original * 0.15;
    } elseif ($cupon_code == 'DETALLE100' && ($tipo_servicio_id == 'interior' || $tipo_servicio_id == 'exterior')) {
        $discount = 100;
    }
    $final_price = $precio_original - $discount;


    // 5. Insertar en la Base de Datos (en la tabla 'citas', NO 'servicio')
    // Asumiré que tienes una tabla 'citas' como la de tus archivos anteriores.
    // Si tu tabla es diferente, ajusta los nombres de las columnas.
    try {
        $sql = "INSERT INTO `servicio` 
                    (nombre_cliente, email, telefono, tipo_vehiculo, tipo_servicio_id, nombre_servicio, precio) 
                VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $nombre_cliente,
            $email,
            $telefono,
            $tipo_vehiculo,
            $tipo_servicio_id,
            $nombre_servicio,
            
        ]);

        // 6. Éxito: Guardar en sesión y redirigir
        $_SESSION['booking_success'] = [
            'date' => $fecha,
            'time' => $hora,
            'serviceType' => $tipo_servicio_id,
            'email' => $email,
            'coupon_code' => $cupon_code,
            'final_price' => $final_price
        ];

        header("Location: Agendar_Cita.php"); // Redirigir a la misma página
        exit;

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error al guardar la cita: " . $e->getMessage();
        header("Location: Agendar_Cita.php");
        exit;
    }
    
} else {
    // Si alguien intenta acceder a este archivo directamente
    header("Location: Agendar_Cita.php");
    exit;
}
?>