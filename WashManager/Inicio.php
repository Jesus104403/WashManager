<?php
// --- INICIO: AGREGADO PARA CONTROL DE SESIÓN ---
session_start(); 
// Verificamos si existe la variable de sesión (usando el nombre que usaste en tu login: 'sesion_email')
$isLoggedIn = isset($_SESSION['sesion_email']);
// -----------------------------------------------

// --- LÓGICA PHP ---
// Estos arrays reemplazan las listas estáticas de <SelectItem> en React
$vehicle_types = [
    "sedan" => "Sedán",
    "suv" => "SUV",
    "camioneta" => "Camioneta",
    "van" => "Van",
    "deportivo" => "Deportivo",
    "compacto" => "Compacto"
];

$wash_types = [
    "basico" => "Lavado Básico",
    "premium" => "Lavado Premium",
    "completo" => "Lavado Completo",
    "express" => "Lavado Express",
    "interior" => "Detallado Interior",
    "exterior" => "Detallado Exterior"
];

// Datos para la sección de "Por qué confiar"
// Reemplazamos los íconos de lucide-react con SVGs inline
$features = [
    [
        "icon_svg" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-blue-600 mb-4"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>',
        "title" => "Agenda Fácil"
    ],
    [
        "icon_svg" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-blue-600 mb-4"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>',
        "title" => "Calidad Garantizada"
    ],
    [
        "icon_svg" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-blue-600 mb-4"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        "title" => "Servicio Rápido"
    ],
    [
        "icon_svg" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-blue-600 mb-4"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.414 2.414 0 0 0 3.414 0l5.586-5.586a2.414 2.414 0 0 0 0-3.414L12.586 2.586z"/><circle cx="8.5" cy="8.5" r="1.5"/></svg>',
        "title" => "Precios Justos"
    ]
];

// Datos para la sección de servicios
$services = [
    [
        "id" => "basico",
        "title" => "Lavado Básico",
        "price" => "$199",
        "popular" => false,
        "features" => ["Lavado exterior", "Limpieza de llantas", "Secado profesional", "Aspirado básico"],
        "button_class" => "border border-gray-300 text-gray-700 hover:bg-gray-50" // Replicando variant="outline"
    ],
    [
        "id" => "Premium",
        "title" => "Lavado Premium",
        "price" => "$299",
        "popular" => true,
        "features" => ["Todo lo del Básico", "Encerado profesional", "Limpieza interior completa", "Pulido de tablero", "Aromatizante premium"],
        "button_class" => "bg-white text-blue-600 hover:bg-gray-100" // Replicando variant="secondary"
    ],
    [
        "id" => "Completo",
        "title" => "Lavado Completo",
        "price" => "$399",
        "popular" => false,
        "features" => ["Todo lo del Premium", "Detallado motor", "Pulido de faros", "Limpieza profunda de tapicería", "Protección UV"],
        "button_class" => "border border-gray-300 text-gray-700 hover:bg-gray-50" // Replicando variant="outline"
    ]
];

// --- MANEJO DEL FORMULARIO ---
// Esto reemplaza la función handleCheckAvailability de React
$availability_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los valores enviados por el formulario
    $vehicle_type_key = $_POST['vehicle_type'] ?? '';
    $wash_type_key = $_POST['wash_type'] ?? '';

    // Buscamos los nombres legibles en nuestros arrays
    $vehicle_type_name = $vehicle_types[$vehicle_type_key] ?? 'No seleccionado';
    $wash_type_name = $wash_types[$wash_type_key] ?? 'No seleccionado';

    // Creamos un mensaje de confirmación (en una app real, aquí consultarías la base de datos)
    if ($vehicle_type_key && $wash_type_key) {
        $availability_message = "<div class='mt-4 p-4 text-sm bg-green-100 text-green-800 rounded-xl'>Buscando disponibilidad para: <strong>$vehicle_type_name</strong> con <strong>$wash_type_name</strong>...</div>";
    } else {
        $availability_message = "<div class='mt-4 p-4 text-sm bg-red-100 text-red-800 rounded-xl'>Por favor, selecciona el tipo de vehículo y el tipo de lavado.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WashManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-gray-800">

    <header class="border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="12" r="10" opacity="0.3"/>
                            <circle cx="9" cy="10" r="1.5"/>
                            <circle cx="15" cy="10" r="1.5"/>
                            <path d="M9 14c0 1.5 1.3 3 3 3s3-1.5 3-3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div>
                        <div class="tracking-tight">Wash</div>
                        <div class="tracking-tight">Manager</div>
                    </div>
                </div>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700">Inicio</a>
                    <a href="./Nuestros_Lavados.php" class="text-gray-700 hover:text-gray-900">Nuestros Lavados</a>
                    
                    <?php if ($isLoggedIn): ?>
                        <a href="./Agendar_Cita.php" class="text-gray-700 hover:text-gray-900">Agendar Cita</a>
                    <?php endif; ?>
                    <a href="./Cupones.php" class="text-gray-700 hover:text-gray-900">Cupones</a>
                    <a href="../login/registro_publico.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                        Inicia Sesion
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-20">
        <div class="max-w-2xl mx-auto text-center space-y-8">
            <div class="space-y-4">
                <h1 class="text-5xl md:text-6xl text-gray-800 tracking-tight">
                    El Brillo que<br>tu Auto Merece
                </h1>
                <p class="text-xl text-gray-600">
                    Rápido, Fácil y a un Clic de Distancia
                </p>
                <p class="text-gray-600">
                    Agenda en línea, elige tu lavado perfecto<br>
                    y aprovecha nuestras promociones exclusivas
                </p>
            </div>

            <form method="POST" action="index.php" class="space-y-4 pt-8">
                
                <select name="vehicle_type" class="w-full h-14 text-base bg-white border border-gray-300 rounded-xl px-4" required>
                    <option value="" disabled selected>Tipo de vehículo</option>
                    <?php
                    // Usamos un bucle PHP para generar las opciones
                    foreach ($vehicle_types as $value => $label) {
                        echo "<option value=\"$value\">$label</option>";
                    }
                    ?>
                </select>

                <select name="wash_type" class="w-full h-14 text-base bg-white border border-gray-300 rounded-xl px-4" required>
                    <option value="" disabled selected>Tipo de lavado</option>
                    <?php
                    foreach ($wash_types as $value => $label) {
                        echo "<option value=\"$value\">$label</option>";
                    }
                    ?>
                </select>

                <button type="submit" class="w-full h-14 text-base bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold">
                    Ver Disponibilidad
                </button>
            </form>

            <?php
            if (!empty($availability_message)) {
                echo $availability_message;
            }
            ?>
        </div>
    </main>

    <section class="container mx-auto px-6 py-20">
        <h2 class="text-3xl text-center text-gray-800 mb-16">
            ¿Por Qué Confiar en Nosotros?
        </h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 max-w-4xl mx-auto">
            <?php
            // Reemplazamos <FeatureIcon> con un bucle PHP
            foreach ($features as $feature) {
                echo '<div class="flex flex-col items-center text-center">';
                echo $feature['icon_svg']; // SVG con clases de Tailwind
                echo '<h3 class="text-lg font-semibold text-gray-800">' . htmlspecialchars($feature['title']) . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <section class="bg-gray-50 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl text-center text-gray-800 mb-4">
                Nuestros Servicios
            </h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                Ofrecemos una amplia gama de servicios de lavado profesional para mantener tu vehículo impecable
            </p>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <?php
                // Generamos las tarjetas de servicio dinámicamente
                foreach ($services as $service) {
                    // Definimos clases base y las modificamos si es "popular"
                    $card_classes = "bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow";
                    $list_classes = "space-y-3 text-gray-600 mb-6";
                    $button_classes = "w-full py-3 px-4 rounded-lg font-semibold " . $service['button_class'];

                    if ($service['popular']) {
                        $card_classes = "bg-blue-600 text-white rounded-2xl p-8 shadow-lg scale-105";
                        $list_classes = "space-y-3 mb-6"; // El texto ya es blanco por el div padre
                    }
                    
                    echo "<div class=\"$card_classes\">";

                    if ($service['popular']) {
                        echo '<div class="inline-block bg-white text-blue-600 px-3 py-1 rounded-full text-sm mb-4 font-semibold">Más Popular</div>';
                    }

                    echo '<h3 class="text-xl font-semibold mb-2">' . htmlspecialchars($service['title']) . '</h3>';
                    echo '<div class="text-3xl font-bold mb-4">' . htmlspecialchars($service['price']) . '</div>';
                    
                    echo "<ul class=\"$list_classes\">";
                    foreach ($service['features'] as $feature_item) {
                        echo '<li>• ' . htmlspecialchars($feature_item) . '</li>';
                    }
                    echo "</ul>";
                    
                    // CONDICIÓN AGREGADA: Solo muestra el botón si está logueado
                    if ($isLoggedIn) {
                        echo '<a href="./Agendar_Cita.php?wash_type=' . $service['id'] . '" class="' . $button_classes . '">' . 'Agendar Ahora' . '</a>';
                    } else {
                         // Si no está logueado, podemos mandarlo al login o ocultarlo. Aquí lo mando al login.
                        echo '<a href="../login/index.php" class="' . $button_classes . '">' . 'Inicia Sesión' . '</a>';
                    }
                    // FIN CONDICIÓN

                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                           <svg class="w-6 h-6 text-gray-900" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10" opacity="0.3"/>
                                <circle cx="9" cy="10" r="1.5"/>
                                <circle cx="15" cy="10" r="1.5"/>
                                <path d="M9 14c0 1.5 1.3 3 3 3s3-1.5 3-3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold">Wash</div>
                            <div class="text-sm font-semibold">Manager</div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">
                        El mejor servicio de lavado de autos en la ciudad
                    </p>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold">Servicios</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Lavado Básico</a></li>
                        <li><a href="#" class="hover:text-white">Lavado Premium</a></li>
                        <li><a href="#" class="hover:text-white">Lavado Completo</a></li>
                        <li><a href="#" class="hover:text-white">Detallado</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold">Horario</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Lunes - Viernes: 8:00 - 19:00</li>
                        <li>Sábado: 9:00 - 18:00</li>
                        <li>Domingo: 10:00 - 15:00</li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold">Contacto</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Av. Principal 123</li>
                        <li>Ciudad de México</li>
                        <li>Tel: (555) 123-4567</li>
                        <li>info@autolavadokoala.com</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 WashManager. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>