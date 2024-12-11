<!-- verificacion de logueo de usuario exitoso y etiqueta cerrar sesion -->
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['nombre_usuario']);
?>

<a href="logout.php">Cerrar sesión</a>
