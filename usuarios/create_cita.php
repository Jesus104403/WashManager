<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. Obtenemos la fecha de hoy en formato Año-Mes-Dia
$fecha_actual = date('Y-m-d');
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registrar Nueva Cita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="listado_de_lavados.php">Listado</a></li>
                        <li class="breadcrumb-item active">Crear Cita</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                    <!-- Mensajes de error de sesión si existen -->
                    <?php if(isset($_SESSION['mensaje'])): ?>
                        <div class="alert alert-warning">
                            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos de la nueva cita</h3>
                        </div>
                        
                        <div class="card-body">
                            <!-- 1. El formulario apunta al controlador CREATE -->
                            <form action="../app/controllers/citas/create_cita.php" method="post">
                                
                                <!-- SECCIÓN CLIENTE -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cliente <span class="text-danger">*</span></label>
                                            <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre completo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" name="telefono" class="form-control" placeholder="Número de contacto">
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN VEHÍCULO -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo Vehículo</label>
                                            <input type="text" name="tipo_vehiculo" class="form-control" placeholder="Ej: Auto, Camioneta...">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Servicio</label>
                                            <input type="text" name="nombre_servicio" class="form-control" placeholder="Ej: Lavado Completo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sucursal</label>
                                            <input type="text" name="sucursal" class="form-control" placeholder="Nombre de la sucursal">
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN CITA Y PRECIOS -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha Cita <span class="text-danger">*</span></label>
                                            <!-- 
                                                2. APLICAMOS LA RESTRICCIÓN VISUAL: 
                                                El atributo 'min' impide seleccionar fechas anteriores a hoy 
                                            -->
                                            <input type="date" name="fecha_cita" class="form-control" min="<?php echo $fecha_actual; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hora <span class="text-danger">*</span></label>
                                            <input type="time" name="hora_cita" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Precios: IDs para JS -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Precio Base</label>
                                            <input type="number" step="0.01" id="precio_original" name="precio_original" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Descuento ($)</label>
                                            <input type="number" step="0.01" id="cupon_valor" name="cupon" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="color:green">Precio Final</label>
                                            <input type="number" step="0.01" id="precio_final" name="precio_final" class="form-control" style="font-weight: bold; background-color: #f0fff4;">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group text-right">
                                    <a href="listado_de_lavados.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar Cita</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../layout/parte2.php'); ?>

<!-- Script para calcular el precio automáticamente -->
<script>
    const inputOriginal = document.getElementById('precio_original');
    const inputCupon = document.getElementById('cupon_valor');
    const inputFinal = document.getElementById('precio_final');

    function calcularFinal() {
        let base = parseFloat(inputOriginal.value) || 0;
        let descuento = parseFloat(inputCupon.value) || 0; 
        
        let total = base;
        if(!isNaN(descuento) && descuento > 0) {
             total = base - descuento;
        }
        // Evitar negativos
        if (total < 0) total = 0;

        inputFinal.value = total.toFixed(2);
    }

    inputOriginal.addEventListener('input', calcularFinal);
    inputCupon.addEventListener('input', calcularFinal);
</script>