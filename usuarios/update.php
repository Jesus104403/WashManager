<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

// 1. CORRECCIÓN DE INCLUDE:
// Incluimos 'show_usuario.php' (del contexto) para obtener los
// datos $nombres, $email y $id_usuario_get.
include('../app/controllers/usuarios/update_usuario.php'); 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Título corregido -->
                    <h1 class="m-0">Actualizar Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Actualizar datos del Usuario</li>
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
                <div class="col-md-8">
                    <!-- 2. CORRECCIÓN DE CSS: 'card-success' (con 'cc') -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos del usuario</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-8">
                                    
                                    <!-- 3. CORRECCIÓN DE FORM ACTION:
                                         Apunta al controlador que está a la derecha (update_controller.php) -->
                                    <form action="../app/controllers/usuarios/update.php" method="post">
                                        
                                        <!-- 4. CORRECCIÓN DE INPUT OCULTO:
                                             - Corregida la sintaxis (type="hidden")
                                             - Corregido el 'name' a 'id_usuaros' para que coincida con tu controlador.
                                             - Corregido el 'value' para que imprima la variable $id_usuario_get
                                        -->
                                        <input type="hidden" name="id_usuaros" value="<?php echo $id_usuario_get;?>"> 
                                        
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <!-- Eliminado el placeholder que no es necesario aquí -->
                                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <!-- Dejar vacío para no cambiar la contraseña. 
                                                 Tu controlador (a la derecha) ya maneja esto. -->
                                            <input type="password" name="password_user" class="form-control" placeholder="Dejar en blanco si no desea cambiar">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Repita la contraseña</label>
                                            <input type="password" name="password_repeet" class="form-control" placeholder="Dejar en blanco si no desea cambiar">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                                            <!-- El botón 'submit' ahora enviará al 'update_controller.php' -->
                                            <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
<?php
include('../layout/mensajes.php');
?>