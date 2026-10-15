<?php 
// 1. Obtenemos el ID de la URL
$id_usuario_get = $_GET['id'];

// 2. CORRECCIÓN 1: Preparamos la consulta SQL con un marcador de posición.
// Usamos :id_usuario como un "espacio reservado" para la variable.
//
// OJO: Revisa bien el nombre de tu columna. 
// Escribiste 'id_usuaros'. Si es 'id_usuarios' (con 'i'), cámbialo abajo.
$sql_usuarios = "SELECT * FROM tb_usuarios WHERE id_usuaros = :id_parametro";

// 3. Preparamos la consulta
$query_usuarios = $pdo->prepare($sql_usuarios);

// 4. CORRECCIÓN 2: "Atamos" la variable al marcador de posición y ejecutamos.
// Le decimos a PDO que :id_parametro debe ser reemplazado por el valor 
// de la variable $id_usuario_get.
$query_usuarios->execute(['id_parametro' => $id_usuario_get]);

// 5. CORRECCIÓN 3: Usamos fetch() en lugar de fetchAll()
// Como solo esperamos UN resultado (un usuario), fetch() es más directo.
$usuarios_dato = $query_usuarios->fetch(PDO::FETCH_ASSOC);

// 6. CORRECCIÓN 4: Asignamos las variables directamente (ya no se necesita foreach)
// También es buena idea inicializarlas por si el usuario no existe.
$nombres = "";
$email = "";

if ($usuarios_dato) {
    // Si la consulta encontró al usuario, llenamos las variables
    $nombres = $usuarios_dato['nombres'];
    $email = $usuarios_dato['email'];
} else {
    // Opcional: puedes poner un mensaje si el ID no existe
    // echo "El usuario con ID $id_usuario_get no fue encontrado.";
}

?>