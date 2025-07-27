<?php
session_start();
if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

//Errores en caso de ingresar campos vacíos
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $errores = [];

    if (empty($_POST['hotel'])) {
        $errores[] = "El campo es obligatorio";
    }
    if (empty($_POST['ciudad'])) {
        $errores[] = "El campo es obligatorio";
    }    
    if (empty($_POST['pais'])) {
        $errores[] = "El campo es obligatorio";
    }    
    if (empty($_POST['fecha'])) {
        $errores[] = "El campo es obligatorio";
    }    
    if (empty($_POST['duracion'])) {
        $errores[] = "El campo es obligatorio";
    }

//Validar que no existen errores y agregar
if (empty($errores)) {
    $paquete = [
        'hotel' => $_POST['hotel'],
        'ciudad' => $_POST['ciudad'],
        'pais' => $_POST['pais'],
        'fecha' => $_POST['fecha'],
        'duracion' => $_POST['duracion']
    ];
    $_SESSION['carrito'][] = $paquete;
    echo "<div class='notificacion'>Agregado al carrito</div>";
} else {
    foreach ($errores as $error) {
        echo "<div class='error'>$error</div>";
    }
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vaciar'])) {
  $_SESSION['carrito'] = [];
  echo "<div class='notificacion'>🧹 Carrito vaciado.</div>";
}
?>
