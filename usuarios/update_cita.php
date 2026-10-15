<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. Recuperamos los datos actuales usando el mismo controlador de "Ver"
// Esto llenará variables como $nombre_cliente, $email, etc.
include('../app/controllers/citas/show_lavados.php'); 
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Cita de Lavado</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="show_lavados.php">Listado</a></li>
                        <li class="breadcrumb-item active">Editar</li>
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

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Datos</h3>
                        </div>
                        
                        <div class="card-body">
                            <!-- 2. El formulario apunta al controlador UPDATE -->
                            <form action="../app/controllers/citas/update_cita.php" method="post">
                                
                                <!-- CAMPO OCULTO OBLIGATORIO: El ID de la cita -->
                                <input type="hidden" name="id_cita" value="<?php echo $id_cita_get; ?>">

                                <!-- SECCIÓN CLIENTE -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cliente</label>
                                            <input type="text" name="nombre_cliente" class="form-control" value="<?php echo $nombre_cliente; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN VEHÍCULO -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo Vehículo</label>
                                            <input type="text" name="tipo_vehiculo" class="form-control" value="<?php echo $tipo_vehiculo; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Servicio</label>
                                            <input type="text" name="nombre_servicio" class="form-control" value="<?php echo $nombre_servicio; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sucursal</label>
                                            <input type="text" name="sucursal" class="form-control" value="<?php echo $sucursal; ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN CITA Y PRECIOS -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha Cita</label>
                                            <input type="date" name="fecha_cita" class="form-control" value="<?php echo $fecha_cita; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hora</label>
                                            <input type="time" name="hora_cita" class="form-control" value="<?php echo $hora_cita; ?>">
                                        </div>
                                    </div>
                                    
                                    <!-- Precios: IDs añadidos para cálculo automático en JS -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Precio Base</label>
                                            <input type="number" step="0.01" id="precio_original" name="precio_original" class="form-control" value="<?php echo $precio_original; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Descuento/Cupón ($)</label>
                                            <input type="number" step="0.01" id="cupon_valor" name="cupon" class="form-control" value="<?php echo $cupon; ?>" placeholder="Ej: 10.00">
                                            <small class="text-muted">Valor numérico</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="color:green">Precio Final</label>
                                            <input type="number" step="0.01" id="precio_final" name="precio_final" class="form-control" value="<?php echo $precio_final; ?>" style="font-weight: bold; background-color: #f0fff4;">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group text-right">
                                    <a href="show_lavados.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Cambios</button>
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

<!-- Script Opcional: Calcular Precio Final automáticamente -->
<script>
    // Si cambias el precio original o el cupón, actualiza el final
    const inputOriginal = document.getElementById('precio_original');
    const inputCupon = document.getElementById('cupon_valor');
    const inputFinal = document.getElementById('precio_final');

    function calcularFinal() {
        let base = parseFloat(inputOriginal.value) || 0;
        // Aquí asumo que el cupón es un valor en dinero a restar. 
        // Si en tu BD guardas el código (texto) en lugar del valor, borra este script.
        let descuento = parseFloat(inputCupon.value) || 0; 
        
        // Solo resta si es numérico, si es texto lo ignora
        let total = base;
        if(!isNaN(descuento) && descuento > 0) {
             total = base - descuento;
        }
        
        inputFinal.value = total.toFixed(2);
    }

    inputOriginal.addEventListener('input', calcularFinal);
    // Descomenta la siguiente línea si el campo cupón es numérico
    // inputCupon.addEventListener('input', calcularFinal);
</script>