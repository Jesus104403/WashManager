<?php
// --- Iconos SVG (reemplazo de lucide-react) ---
// Usaremos estos strings de SVG en nuestros arrays de datos

$icon_check = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"><path d="M20 6 9 17l-5-5"/></svg>';

$icon_check_large = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M20 6 9 17l-5-5"/></svg>';

$icon_droplet = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5-2.5-2-4.5-4-4.5-2 0-3.5 2-4 4.5-.5 2.5-2 4.9-4 6.5C3 11.1 2 13 2 15a7 7 0 0 0 7 7z"/></svg>';

$icon_sparkles = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-blue-600"><path d="m12 3-1.91 5.83-5.83 1.91L12 12.66l1.91 5.83 5.83 1.91L12 17.34l-1.91-5.83z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>';

$icon_zap = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>';

$icon_home = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>';

$icon_car = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><path d="M7 17h10"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/></svg>';


// --- DATOS DE SERVICIOS (convertidos a array PHP) ---

$services = [
    [
        "id" => "basico",
        "name" => "Lavado Básico",
        "price" => "$299",
        "duration" => "30 min",
        "description" => "Perfecto para un mantenimiento regular de tu vehículo. Incluye los servicios esenciales para mantener tu auto limpio.",
        "features" => [
            "Lavado exterior completo",
            "Limpieza profunda de llantas",
            "Secado profesional",
            "Aspirado básico interior",
            "Limpieza de cristales"
        ],
        "popular" => false,
        "image" => "https://images.unsplash.com/photo-1760827797819-4361cd5cd353?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjYXIlMjB3YXNoJTIwc2VydmljZXxlbnwxfHx8fDE3NjI2MDc2MjZ8MA&ixlib=rb-4.1.0&q=80&w=1080"
    ],
    [
        "id" => "premium",
        "name" => "Lavado Premium",
        "price" => "$499",
        "duration" => "60 min",
        "description" => "Nuestro servicio más popular. Combina limpieza profunda con protección y cuidado profesional.",
        "features" => [
            "Todo lo incluido en Básico",
            "Encerado profesional con cera premium",
            "Limpieza interior completa y detallada",
            "Pulido y protección de tablero",
            "Limpieza de vestiduras",
            "Aromatizante premium de larga duración"
        ],
        "popular" => true,
        "image" => "https://images.unsplash.com/photo-1682858110563-3f609263d418?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjbGVhbiUyMGNhciUyMGludGVyaW9yfGVufDF8fHx8MTc2MjU5NzU1N3ww&ixlib=rb-4.1.0&q=80&w=1080"
    ],
    [
        "id" => "completo",
        "name" => "Lavado Completo Deluxe",
        "price" => "$799",
        "duration" => "90 min",
        "description" => "El tratamiento más completo para tu vehículo. Ideal para ocasiones especiales o para mantener tu auto en condiciones óptimas.",
        "features" => [
            "Todo lo incluido en Premium",
            "Detallado y limpieza de motor",
            "Pulido profesional de faros",
            "Limpieza profunda de tapicería",
            "Protección UV para pintura",
            "Restauración de plásticos",
            "Limpieza de cajuela"
        ],
        "popular" => false,
        "image" => "https://images.unsplash.com/photo-1761934658038-d0e6792378b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjYXIlMjBkZXRhaWxpbmclMjBwcm9mZXNzaW9uYWx8ZW58MXx8fHwxNzYyNTMwMjA4fDA&ixlib=rb-4.1.0&q=80&w=1080"
    ]
];

$specialServices = [
    [
        "icon_svg" => $icon_zap,
        "name" => "Lavado Express",
        "price" => "$199",
        "duration" => "15 min",
        "description" => "Para cuando tienes prisa. Lavado exterior rápido y eficiente."
    ],
    [
        "icon_svg" => $icon_home,
        "name" => "Detallado Interior",
        "price" => "$599",
        "duration" => "120 min",
        "description" => "Limpieza profunda del interior: tapicería, alfombras, tablero y más."
    ],
    [
        "icon_svg" => $icon_sparkles,
        "name" => "Detallado Exterior",
        "price" => "$699",
        "duration" => "120 min",
        "description" => "Pulido, encerado premium y protección completa de la pintura."
    ],
    [
        "icon_svg" => $icon_car,
        "name" => "Lavado de Motor",
        "price" => "$399",
        "duration" => "45 min",
        "description" => "Limpieza especializada y desengrase del compartimento del motor."
    ]
];

$whyChooseUs = [
    [
        "icon_svg" => $icon_droplet,
        "title" => "Productos Premium",
        "description" => "Utilizamos solo productos de la más alta calidad para el cuidado de tu vehículo"
    ],
    [
        "icon_svg" => $icon_sparkles,
        "title" => "Atención al Detalle",
        "description" => "Cada lavado es realizado con cuidado meticuloso por nuestro equipo profesional"
    ],
    [
        "icon_svg" => $icon_check_large,
        "title" => "Garantía Total",
        "description" => "100% satisfacción garantizada o repetimos el servicio sin costo"
    ]
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Lavados - Autolavado Koala</title>
    <!-- Incluimos Tailwind CSS desde el CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-gray-800">

     <!-- Header -->
    <header class="border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo (SVG copiado de tu React) -->
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

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="./Inicio.php" class="text-gray-700 hover:text-gray-900">Inicio</a>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700">Nuestros Lavados</a>
                    <a href="./Agendar_Cita.php" class="text-gray-700 hover:text-gray-900">Agendar Cita</a>
                    <a href="./Cupones.php" class="text-gray-700 hover:text-gray-900">Cupones</a>
                    <!-- El <Button> de React se convierte en un <a> o <button> con clases -->
                    <a href="../login/index.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                        Inicia Sesion
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-gray-50 to-white py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <h1 class="text-5xl tracking-tight text-gray-800">
                    Nuestros Lavados
                </h1>
                <p class="text-xl text-gray-600">
                    Servicios profesionales diseñados para cada necesidad
                </p>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    En Autolavado Koala ofrecemos una variedad de servicios de lavado profesional, 
                    desde el mantenimiento básico hasta tratamientos completos de detallado. 
                    Cada servicio está diseñado con la más alta calidad y atención al detalle.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Services -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl text-center text-gray-800 mb-4">
                Paquetes Principales
            </h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">
                Nuestros tres paquetes de lavado más populares, cada uno diseñado para diferentes necesidades
            </p>

            <div class="space-y-12 max-w-6xl mx-auto">
                
                <?php foreach ($services as $index => $service): ?>
                    <?php
                        // Lógica para alternar el layout
                        $layoutClasses = $index % 2 === 1 ? 'md:flex-row-reverse' : '';
                        $imageOrderClass = $index % 2 === 1 ? 'md:order-2' : '';
                        $contentOrderClass = $index % 2 === 1 ? 'md:order-1' : '';
                    ?>
                    <div class="grid md:grid-cols-2 gap-12 items-center <?php echo $layoutClasses; ?>">
                        
                        <!-- Image -->
                        <div class="<?php echo $imageOrderClass; ?>">
                            <div class="relative rounded-2xl overflow-hidden shadow-lg aspect-[4/3]">
                                <img 
                                    src="<?php echo htmlspecialchars($service['image']); ?>" 
                                    alt="<?php echo htmlspecialchars($service['name']); ?>" 
                                    class="w-full h-full object-cover"
                                >
                                <?php if ($service['popular']): ?>
                                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full font-semibold">
                                        Más Popular
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="space-y-6 <?php echo $contentOrderClass; ?>">
                            <div>
                                <h3 class="text-3xl font-semibold text-gray-800 mb-2"><?php echo htmlspecialchars($service['name']); ?></h3>
                                <div class="flex items-baseline gap-3 mb-4">
                                    <span class="text-4xl font-bold text-gray-800"><?php echo htmlspecialchars($service['price']); ?></span>
                                    <span class="text-gray-600">• <?php echo htmlspecialchars($service['duration']); ?></span>
                                </div>
                                <p class="text-gray-600"><?php echo htmlspecialchars($service['description']); ?></p>
                            </div>

                            <div class="space-y-3">
                                <div class="text-gray-700 font-semibold">Incluye:</div>
                                <ul class="space-y-2">
                                    <?php foreach ($service['features'] as $feature): ?>
                                        <li class="flex items-start gap-3">
                                            <?php echo $icon_check; // Icono SVG de Check ?>
                                            <span class="text-gray-600"><?php echo htmlspecialchars($feature); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Botón (convertido a <a>) -->
                            <a 
                                href="http://localhost/WashManager/Agendar_Cita.php" 
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg text-lg"
                            >
                                Agendar <?php echo htmlspecialchars($service['name']); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>

    <!-- Special Services -->
    <section class="bg-gray-50 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl text-center text-gray-800 mb-4">
                Servicios Especializados
            </h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">
                Servicios adicionales y especializados para necesidades específicas
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                
                <?php foreach ($specialServices as $service): ?>
                    <div classa="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <?php echo $service['icon_svg']; // Icono SVG correspondiente ?>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo htmlspecialchars($service['name']); ?></h3>
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($service['price']); ?></span>
                            <span class="text-sm text-gray-600">• <?php echo htmlspecialchars($service['duration']); ?></span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
                        
                        <!-- Botón (variant="outline") -->
                        <a 
                            href="#" 
                            class="inline-block w-full text-center border border-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-lg hover:bg-gray-50"
                        >
                            Más Información
                        </a>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl text-center text-gray-800 mb-12">
                    ¿Por Qué Elegirnos?
                </h2>

                <div class="grid md:grid-cols-3 gap-8">
                    
                    <?php foreach ($whyChooseUs as $item): ?>
                        <div class="text-center space-y-3">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                                <?php echo $item['icon_svg']; ?>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="text-gray-600">
                                <?php echo htmlspecialchars($item['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">
                ¿Listo para darle a tu auto el cuidado que merece?
            </h2>
            <p class="text-xl mb-8 text-blue-100">
                Agenda tu cita hoy y descubre por qué somos el autolavado favorito de la ciudad
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                
                <!-- Botón (variant="secondary") -->
                <a 
                    href="http://localhost/WashManager/Agendar_Cita.php" 
                    class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg text-lg hover:bg-gray-100"
                >
                    Agendar Ahora
                </a>
                
                <!-- Botón (variant="outline" en fondo oscuro) -->
                <a 
                    href="http://localhost/WashManager/Cupones.php" 
                    class="inline-block bg-transparent border border-white text-white font-semibold px-8 py-3 rounded-lg text-lg hover:bg-white hover:text-blue-600"
                >
                    Ver Promociones
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <!-- Logo placeholder del footer -->
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