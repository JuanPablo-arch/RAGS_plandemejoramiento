<!-- Verifica si el usuario está autenticado; si no, lo redirige a login -->
<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); 
    exit();
}

$sql = "SELECT * FROM minutas ORDER BY fecha_hora DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$minutas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Minutas</title>
    <link href="css/tabla_minuta.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-white">Registros de Minutas</h2>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="registro_minuta.php" class="btn btn-primary">Registrar Nueva Minuta</a>
            <a href="usuarios.php" class="btn btn-secondary mx-2">Ver Usuarios</a>
            <a href="logout.php" class="btn btn-warning">Cerrar sesión</a>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Fecha y Hora</th>
                    <th>Visitante</th>
                    <th>Documento</th>
                    <th>Motivo</th>
                    <th>Autorizado Por</th>
                    <th>Guardia</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($minutas as $minuta): ?>
                    <tr>
                        <td><?= htmlspecialchars($minuta['id']) ?></td>
                        <td><?= htmlspecialchars($minuta['fecha_hora']) ?></td>
                        <td><?= htmlspecialchars($minuta['nombre_visitante']) ?></td>
                        <td><?= htmlspecialchars($minuta['documento_identidad']) ?></td>
                        <td><?= htmlspecialchars($minuta['motivo_ingreso']) ?></td>
                        <td><?= htmlspecialchars($minuta['persona_autoriza']) ?></td>
                        <td><?= htmlspecialchars($minuta['nombre_guardia']) ?></td>
                        <td><?= htmlspecialchars($minuta['observaciones']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
