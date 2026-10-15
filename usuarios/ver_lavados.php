<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// Incluimos el controlador que busca la información por ID
// Este archivo se encarga de llenar variables como $nombre_cliente, $email, etc.
include('../app/controllers/citas/show_lavados.php'); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detalles del Lavado</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="listado_de_lavados.php">Listado de Lavados</a></li>
                        <li class="breadcrumb-item active">Ver Lavado</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Información del Lavado Registrado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body" style="display: block;">
                            
                            <!-- Validación: Si no hay datos cargados, mostramos una alerta -->
                            <?php if(empty($nombre_cliente)): ?>
                                <div class="alert alert-warning">
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> ¡Atención!</h5>
                                    No se encontraron datos. Asegúrate de haber seleccionado un lavado desde el listado principal.
                                </div>
                            <?php endif; ?>

                            <form>
                                <!-- SECCIÓN 1: DATOS DEL CLIENTE -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-primary"><i class="fas fa-user"></i> Datos del Cliente</h5>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre del Cliente</label>
                                            <input type="text" class="form-control" value="<?php echo $nombre_cliente; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Correo Electrónico</label>
                                            <input type="email" class="form-control" value="<?php echo $email; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" class="form-control" value="<?php echo $telefono; ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN 2: DATOS DEL VEHÍCULO Y SERVICIO -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5 class="text-primary"><i class="fas fa-car"></i> Vehículo y Servicio</h5>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo de Vehículo</label>
                                            <input type="text" class="form-control" value="<?php echo $tipo_vehiculo; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Servicio Solicitado</label>
                                            <input type="text" class="form-control" value="<?php echo $nombre_servicio; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sucursal</label>
                                            <input type="text" class="form-control" value="<?php echo $sucursal; ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECCIÓN 3: FECHA Y PAGO -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h5 class="text-primary"><i class="fas fa-calendar-alt"></i> Cita y Facturación</h5>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de Cita</label>
                                            <input type="date" class="form-control" value="<?php echo $fecha_cita; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hora</label>
                                            <input type="time" class="form-control" value="<?php echo $hora_cita; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Precio Base</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" value="<?php echo $precio_original; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Cupón Aplicado</label>
                                            <input type="text" class="form-control" value="<?php echo $cupon; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="color: green;">Precio Final</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-success text-white">$</span>
                                                </div>
                                                <input type="text" class="form-control bg-white text-success font-weight-bold" value="<?php echo $precio_final; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                         <p class="text-muted text-sm">Registro creado el: <?php echo $fecha_creacion; ?></p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <!-- Botón para volver al listado -->
                                        <a href="show_lavados.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver al Listado</a>
                                        
                                        <!-- Botón opcional para ir a editar directamente desde aquí -->
                                        <?php if(!empty($id_cita_get)): ?>
                                            <a href="update_cita.php?id=<?php echo $id_cita_get; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Editar este Lavado</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
?>