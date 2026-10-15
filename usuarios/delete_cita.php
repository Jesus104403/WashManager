<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. Reutilizamos el controlador 'show' para cargar los datos que vamos a borrar
include('../app/controllers/citas/show_lavados.php'); 
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Eliminar Cita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="listado_de_lavados.php">Listado</a></li>
                        <li class="breadcrumb-item active">Eliminar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                    <!-- Usamos 'card-danger' (ROJO) para indicar acción destructiva -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            
                            <!-- Mostramos los datos bloqueados (disabled) para verificar -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <input type="text" class="form-control" value="<?php echo $nombre_cliente; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Vehículo</label>
                                        <input type="text" class="form-control" value="<?php echo $tipo_vehiculo; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Servicio</label>
                                        <input type="text" class="form-control" value="<?php echo $nombre_servicio; ?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha Cita</label>
                                        <input type="text" class="form-control" value="<?php echo $fecha_cita; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="text" class="form-control" value="<?php echo $hora_cita; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sucursal</label>
                                        <input type="text" class="form-control" value="<?php echo $sucursal; ?>" disabled>
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Precio Final</label>
                                        <input type="text" class="form-control" value="$<?php echo $precio_final; ?>" disabled style="background-color: #ffe6e6; font-weight: bold;">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            
                            <!-- Formulario de confirmación -->
                            <form action="../app/controllers/citas/delete_cita.php" method="post">
                                <!-- Pasamos el ID oculto -->
                                <input type="hidden" name="id_cita" value="<?php echo $id_cita_get; ?>">
                                
                                <div class="form-group text-right">
                                    <a href="listado_de_lavados.php" class="btn btn-secondary">Cancelar</a>
                                    
                                    <!-- Botón de eliminar definitivo -->
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Confirmar Eliminación
                                    </button>
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