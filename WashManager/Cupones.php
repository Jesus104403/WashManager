<?php
// Usamos sesiones para la consistencia, aunque esta página no la usa activamente
session_start();

// --- Iconos SVG (Reemplazo de Lucide) ---
$icon_tag = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.414 2.414 0 0 0 3.414 0l5.586-5.586a2.414 2.414 0 0 0 0-3.414L12.586 2.586z"/><circle cx="8.5" cy="8.5" r="1.5"/></svg>';
$icon_scissors = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" x2="8.12" y1="4" y2="15.88"/><line x1="14.47" x2="20" y1="14.48" y2="20"/><line x1="8.12" x2="12" y1="8.12" y2="12"/></svg>';
$icon_car = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><path d="M7 17h10"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/></svg>';


// --- Lista de Cupones (Array de PHP) ---
$cupones = [
    [
        "icon_svg" => $icon_tag,
        "titulo" => "15% de Descuento",
        "descripcion" => "Obtén un 15% de descuento en tu primer Lavado Premium agendando en línea.",
        "codigo" => "KOALA15",
        "link" => "http://localhost/WashManager/Agendar_Cita.php"
    ],
    [
        "icon_svg" => $icon_scissors,
        "titulo" => "$100 de Descuento",
        "descripcion" => "Recibe $100 de descuento en cualquier servicio de Detallado (Interior o Exterior).",
        "codigo" => "DETALLE100",
        "link" => "http://localhost/WashManager/Agendar_Cita.php"
    ],
    [
        "icon_svg" => $icon_car,
        "titulo" => "Lavado Básico Gratis",
        "descripcion" => "En la compra de un Lavado Completo Deluxe, llévate un código para un Lavado Básico gratis en tu próxima visita.",
        "codigo" => "GRATISBASIC",
        "link" => "http://localhost/WashManager/Agendar_Cita.php"
    ]
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupones y Promociones - Autolavado Koala</title>
    <!-- Incluimos Tailwind CSS desde el CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilo para la línea punteada del cupón */
        .coupon-border {
            border-bottom: 2px dashed #d1d5db; /* border-gray-300 */
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="border-b border-gray-200 bg-white">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="index.php" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="12" r="10" opacity="0.3"/><circle cx="9" cy="10" r="1.5"/><circle cx="15" cy="10" r="1.5"/><path d="M9 14c0 1.5 1.3 3 3 3s3-1.5 3-3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div><div class="tracking-tight">AUTOLAVADO</div><div class="tracking-tight">KOALA</div></div>
                </a>
                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="Inicio.php" class="text-gray-700 hover:text-gray-900">Inicio</a>
                    <a href="Nuestros_Lavados.php" class="text-gray-700 hover:text-gray-900">Nuestros Lavados</a>
                    <a href="Agendar_Cita.php" class="text-gray-700 hover:text-gray-900">Agendar Cita</a>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700">Cupones</a> <!-- PÁGINA ACTIVA -->
                    <a href="Inicio.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                        Inicia Sesion
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-12 md:py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <h1 class="text-4xl md:text-5xl tracking-tight font-bold text-gray-800">
                    Cupones y Promociones
                </h1>
                <p class="text-xl text-gray-600">
                    Aprovecha nuestros descuentos exclusivos por agendar en línea
                </p>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Aquí encontrarás las mejores ofertas para mantener tu auto impecable. 
                    ¡Copia tu código y úsalo al momento de agendar tu cita!
                </p>
            </div>
        </div>
    </section>

    <!-- Cupones Grid Section -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                <?php foreach ($cupones as $cupon): ?>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden flex flex-col">
                    <div class="p-8 space-y-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <?php echo $cupon['icon_svg']; ?>
                        </div>
                        <h2 class="text-3xl font-bold text-blue-600"><?php echo htmlspecialchars($cupon['titulo']); ?></h2>
                        <p class="text-gray-600 text-lg"><?php echo htmlspecialchars($cupon['descripcion']); ?></p>
                    </div>
                    
                    <div class="flex-grow"></div> <!-- Empuja el código hacia abajo -->

                    <div class="p-6 coupon-border space-y-4">
                        <p class="text-center text-gray-500 text-sm">Usa este código al agendar:</p>
                        <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-gray-800 tracking-widest"><?php echo htmlspecialchars($cupon['codigo']); ?></p>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-50">
                        <a href="<?php echo htmlspecialchars($cupon['link']); ?>" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg text-lg">
                            Usar Ahora
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- Footer (de index.php) -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                           <svg class="w-6 h-6 text-gray-900" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10" opacity="0.3"/><circle cx="9" cy="10" r="1.5"/><circle cx="15" cy="10" r="1.5"/><path d="M9 14c0 1.5 1.3 3 3 3s3-1.5 3-3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold">AUTOLAVADO</div>
                            <div class="text-sm font-semibold">KOALA</div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400">
                        El mejor servicio de lavado de autos en la ciudad
                    </p>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold">Servicios</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="nuestros-lavados.php#basico" class="hover:text-white">Lavado Básico</a></li>
                        <li><a href="nuestros-lavados.php#premium" class="hover:text-white">Lavado Premium</a></li>
                        <li><a href="nuestros-lavados.php#completo" class="hover:text-white">Lavado Completo</a></li>
                        <li><a href="nuestros-lavados.php" class="hover:text-white">Detallado</a></li>
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
                <p>&copy; 2025 Autolavado Koala. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>