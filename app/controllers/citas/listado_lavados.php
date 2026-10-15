<?php
/**
 * Controlador para listar todas las citas registradas en la base de datos.
 * Se usa en la vista 'show_lavados.php' (o 'index.php' de citas).
 */

// Verificamos que la variable de conexión $pdo exista antes de usarla
if (isset($pdo)) {
    try {
        // 1. Preparamos la consulta SQL para seleccionar TODO de la tabla 'citas'
        $sql_citas = "SELECT * FROM citas";
        
        // 2. Preparamos la sentencia usando la conexión PDO
        $query_citas = $pdo->prepare($sql_citas);
        
        // 3. Ejecutamos la consulta
        $query_citas->execute();
        
        // 4. Obtenemos todos los resultados y los guardamos en el array $citas_datos
        // Usamos FETCH_ASSOC para poder acceder a los datos por nombre de columna (ej. $cita['nombre_cliente'])
        $citas_datos = $query_citas->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        // Si ocurre un error en la consulta SQL, lo capturamos aquí
        // Dejamos el array vacío para que la página no se rompa al intentar mostrar la tabla
        $citas_datos = [];
        
        // Opcional: Descomenta la siguiente línea para ver el error en pantalla si algo falla
        // echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    // Si no hay conexión a la base de datos configurada en 'config.php'
    // Inicializamos la variable como un array vacío para evitar el error "Undefined variable"
    $citas_datos = [];
}
?>