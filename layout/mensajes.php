<?php

if (isset ($_SESSION['mensaje']) ) {
    $mensaje = $_SESSION['mensaje'];
    ?>
     <script>
  Swal.fire({
  icon: "error",
  title: "Algo fallo",
  text: "Error datos incorrectos!",
  
});
  </script>
    <?php
    unset($_SESSION['mensaje']);
}