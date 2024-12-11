<?php
require 'conexion.php';
session_start();

$message = "";
//El codigo obtiene los datos del formulario enviado por el metodo POST y encripta la contraseña con el algoritmo BCRYPT.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (:nombre_usuario, :email, :contrasena)";
    $stmt = $pdo->prepare($sql);

//El código registra un nuevo usuario en la base de datos, guarda su ID en la sesion, muestra un mensaje de exito con una redireccion al panel de control, y maneja errores si ocurren
    try {
        $stmt->execute([
            ':nombre_usuario' => $nombre_usuario,
            ':email' => $email,
            ':contrasena' => $contrasena
        ]);

        $usuario_id = $pdo->lastInsertId();
        $_SESSION['usuario_id'] = $usuario_id;
        $_SESSION['nombre_usuario'] = $nombre_usuario;

        echo "<script>
            Swal.fire({
                title: 'Registro Exitoso',
                text: 'Bienvenido $nombre_usuario, tu cuenta ha sido creada y estás logueado.',
                icon: 'success',
                confirmButtonText: 'Ir al Dashboard'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'dashboard.php';
                }
            });
        </script>";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="css/styleregistro.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>Registro de Usuario</h2>
        <form method="POST" class="mt-3">
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
        <?php if ($message): ?>
            <div class="alert alert-info mt-3"><?= $message ?></div>
        <?php endif; ?>

        <div class="text-center mt-3">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
