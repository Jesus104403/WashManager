<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. INCLUIR EL CONTROLADOR
// Verifica que el archivo 'listado_de_citas.php' exista en la carpeta 'app/controllers/usuarios/'
// Si este archivo no existe, la variable $citas_datos no se creará.
include('../app/controllers/citas/listado_lavados.php');

// 2. VALIDACIÓN DE EMERGENCIA
// Si por alguna razón el controlador falla, inicializamos la variable para que no salga error en pantalla
if (!isset($citas_datos)) {
    $citas_datos = [];
}
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Lavados Registrados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lavados</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Citas de Lavado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            
                            <!-- Mensaje de error si no hay datos cargados -->
                            <?php if (empty($citas_datos)): ?>
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-circle"></i> 
                                    No se encontraron citas o no se pudo cargar el controlador. 
                                    <br>Verifica que exista el archivo: <code>app/controllers/usuarios/listado_de_citas.php</code>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table id="tabla_citas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nro (ID)</th>
                                            <th>Cliente</th>
                                            <th>Vehículo</th>
                                            <th>Servicio</th>
                                            <th>Fecha y Hora</th>
                                            <th>Precio Final</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // 3. BUCLE FOREACH
                                        // Aquí usamos $citas_datos (PLURAL) que viene del controlador
                                        foreach ($citas_datos as $cita_dato) {
                                            $id_cita = $cita_dato['id']; 
                                        ?>
                                            <tr>
                                                <td><?php echo $id_cita; ?></td>
                                                <td><?php echo $cita_dato['nombre_cliente']; ?></td>
                                                <td><?php echo $cita_dato['tipo_vehiculo']; ?></td>
                                                <td><?php echo $cita_dato['nombre_servicio']; ?></td>
                                                <td><?php echo $cita_dato['fecha_cita'] . " - " . $cita_dato['hora_cita']; ?></td>
                                                <td style="font-weight: bold;"><?php echo $cita_dato['precio_final']; ?></td>
                                                
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <!-- Botón VER: Asegúrate que show_cita.php exista -->
                                                        <a href="ver_lavados.php?id=<?php echo $id_cita; ?>" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i> Ver
                                                        </a>
                                                        
                                                        <a href="update_cita.php?id=<?php echo $id_cita; ?>" class="btn btn-success btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        
                                                        <a href="delete_cita.php?id=<?php echo $id_cita; ?>" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Eliminar
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nro (ID)</th>
                                            <th>Cliente</th>
                                            <th>Vehículo</th>
                                            <th>Servicio</th>
                                            <th>Fecha y Hora</th>
                                            <th>Precio Final</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../layout/parte2.php'); ?>

<script>
    $(function() {
        $("#tabla_citas").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }
        }).buttons().container().appendTo('#tabla_citas_wrapper .col-md-6:eq(0)');
    });
</script>