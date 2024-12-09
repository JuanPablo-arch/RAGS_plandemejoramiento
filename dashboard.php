<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['nombre_usuario']);
?>

<a href="logout.php">Cerrar sesión</a>
