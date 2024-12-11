<!-- verifica autenticacion de usuario, de ser asi envia formulario y almacena datos y redirige a tabla_minutas, de no ser asi notificara error  -->
<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$alertMessage = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha_hora = $_POST['fecha_hora'];
    $nombre_visitante = $_POST['nombre_visitante'];
    $documento_identidad = $_POST['documento_identidad'];
    $motivo_ingreso = $_POST['motivo_ingreso'];
    $persona_autoriza = $_POST['persona_autoriza'];
    $nombre_guardia = $_POST['nombre_guardia'];
    $observaciones = $_POST['observaciones'] ?? null;

    $sql = "INSERT INTO minutas (fecha_hora, nombre_visitante, documento_identidad, motivo_ingreso, persona_autoriza, nombre_guardia, observaciones)
            VALUES (:fecha_hora, :nombre_visitante, :documento_identidad, :motivo_ingreso, :persona_autoriza, :nombre_guardia, :observaciones)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':fecha_hora' => $fecha_hora,
            ':nombre_visitante' => $nombre_visitante,
            ':documento_identidad' => $documento_identidad,
            ':motivo_ingreso' => $motivo_ingreso,
            ':persona_autoriza' => $persona_autoriza,
            ':nombre_guardia' => $nombre_guardia,
            ':observaciones' => $observaciones
        ]);
        
        $alertMessage = "success"; 
        header("Location: tabla_minutas.php");
        exit();

        echo "Registro exitoso. Redirigiendo...";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $alertMessage = "error";
    }
}
?>
