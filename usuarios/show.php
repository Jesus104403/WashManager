<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. CONTROLADOR: Usamos el listado de usuarios como solicitaste
include('../app/controllers/usuarios/show_usuario.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar Usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="listado_lavados.php">Listado de Usuarios</a></li>
                        <li class="breadcrumb-item active">Actualizar Usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"> <!-- Columna de 6 para centrar o ajustar tamaño -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Usuario</h3>
                        </div>
                        
                        <div class="card-body">
                            <!-- El formulario apunta a un controlador de actualización (update.php) que deberías crear -->
                            <form action="../app/controllers/usuarios/update.php" method="post">
                                
                                <!-- Enviamos el ID de forma oculta para saber a quién actualizar -->
                                <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>

                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <!-- Aquí se "dan" los datos al usuario usando 'value' -->
                                    <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" placeholder="Escriba el nombre completo" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Escriba el correo electrónico" required>
                                </div>


                                <hr>
                                
                                <div class="form-group">
                                    <a href="listado_lavados.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">volver</button>
                                </div>

                            </form>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>