<?php
// 1. Iniciamos el manejo de sesiones
session_start();

// 2. VALIDACIÓN: "Si ya hay una cuenta logueada..."
if (isset($_SESSION['sesion_email'])) {
    // ... lo mandamos directo al sistema (no necesita registrarse otra vez)
    // Como este archivo está en la carpeta 'usuarios', y 'listado_lavados.php' también,
    // la ruta es directa.
    header('Location: listado_lavados.php'); 
    exit;
}

// 3. Si NO hay sesión, el código continúa y muestra el formulario de abajo:
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Usuario | AutoLavado Koala</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <!-- Ajusta esta ruta si tu login está en otra carpeta -->
      <a href="../login/index.php" class="h1"><b>AutoLavado</b>Koala</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrar un nuevo miembro</p>

      <!-- Apuntamos al controlador de registro público -->
      <form action="../app/controllers/usuarios/registro.php" method="post">
        
        <div class="input-group mb-3">
          <input type="text" name="nombres" class="form-control" placeholder="Nombre completo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_user" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_repeat" class="form-control" placeholder="Repetir contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- Enlace al Login por si ya tienen cuenta -->
              <a href="../login/index.php" class="text-center">Ya tengo cuenta</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- Bloque PHP para mostrar mensajes de error/éxito que vienen del controlador -->
<?php
if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono']; 
?>
    <script>
    Swal.fire({
        icon: "<?php echo $icono; ?>",
        title: "<?php echo $respuesta; ?>",
    });
    </script>
<?php
    // Borramos el mensaje de la sesión para que no salga al recargar
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}
?>

<!-- jQuery -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>