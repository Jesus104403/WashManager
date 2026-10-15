<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Ajustado a col-md-12 para que la tabla tenga más espacio -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios Registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Se usa 'table-responsive' para que en móviles pequeños
                                 la tabla no rompa el diseño y se pueda deslizar horizontalmente -->
                            <div class="table-responsive">
                                <table id="tabla_usuarios" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Placas (ID)</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <!-- NUEVA COLUMNA DE ACCIONES -->
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($usuarios_datos as $usuarios_dato) {
                                            // Guardamos el ID en una variable para usarlo más fácil
                                            $id_usuario = $usuarios_dato['id_usuaros'];
                                        ?>
                                            <tr>
                                                <!-- Cuidado: 'id_usuaros' podría ser un error y ser 'id_usuarios' -->
                                                <td> <?php echo $id_usuario; ?> </td>
                                                <td> <?php echo $usuarios_dato['nombres']; ?> </td>
                                                <td> <?php echo $usuarios_dato['email']; ?> </td>
                                                <!-- CELDA CON LOS NUEVOS BOTONES -->
                                                <td>
                                                    <!-- Usamos un 'btn-group' para que los botones se vean juntos -->
                                                    <div class="btn-group" role="group" aria-label="Acciones del Usuario">
                                                        <!-- 
                                                            Pasamos el ID del usuario por la URL
                                                            Ejemplo: /usuarios/ver.php?id=<?php echo $id_usuario; ?>
                                                        -->
                                                        <a href="show.php?id=<?php echo $id_usuario; ?>" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i> Ver
                                                        </a>
                                                        <a href="update.php?id=<?php echo $id_usuario; ?>" class="btn btn-success btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <a href="delete.php?id=<?php echo $id_usuario; ?>" class="btn btn-danger btn-sm">
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
                                            <th>Placas (ID)</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <!-- NUEVA COLUMNA DE ACCIONES -->
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> <!-- fin .table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.content-header -->
<?php
include('../layout/parte2.php');
// CORRECCIÓN: Faltaba 'include' para mostrar los mensajes (ej. SweetAlert)
include('../layout/mensajes.php');
?>

<!--
Asegúrate de tener los scripts de DataTables (los que corregimos antes)
incluidos aquí o en tu 'parte2.php'
-->

<script>
    $(function() {
        $("#tabla_usuarios").DataTable({
            
            /* --- INICIO DE CORRECCIÓN --- */
            
            // 1. ESTAS OPCIONES DEBEN IR AFUERA DEL OBJETO 'language'
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            // Esta línea le dice a DataTables QUÉ botones mostrar
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            // 2. Este es el objeto de traducción
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                // 3. Así se traducen los botones que definiste arriba
                "buttons": {
                    "copy": "Copiar",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad de Columnas"
                }
            } // <-- Aquí termina el objeto 'language'
            
            /* --- FIN DE CORRECCIÓN --- */

        }).buttons().container().appendTo('#tabla_usuarios_wrapper .col-md-6:eq(0)');
    });
</script>