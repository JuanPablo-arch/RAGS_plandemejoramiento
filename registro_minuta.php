<!-- verifica si esta logueado en el sistema sino lo redirige nuevamente a login hasta que coincida y se ejecute el script -->
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Minuta</title>
    <link href="css/style_registro_minuta.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-end mb-3">
        <a href="tabla_minutas.php" class="btn btn-primary custom-btn">Volver a Inicio</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Registro de Minuta de Ingreso</h4>
                    </div>
                    <div class="card-body">
                        <form action="minuta.php" method="POST">
                            <div class="mb-3">
                                <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                                <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_visitante" class="form-label">Nombre del Visitante</label>
                                <input type="text" class="form-control" id="nombre_visitante" name="nombre_visitante" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="30" required>
                            </div>
                            <div class="mb-3">
                                <label for="documento_identidad"  class="form-label">Documento de Identidad</label>
                                <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" pattern="\d+" title="Solo se permiten números" minlength="10" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="motivo_ingreso" class="form-label">Motivo de Ingreso</label>
                                <textarea class="form-control" id="motivo_ingreso" name="motivo_ingreso" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="persona_autoriza" class="form-label">Persona que Autoriza</label>
                                <input type="text" class="form-control" id="persona_autoriza" name="persona_autoriza" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="30"  required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_guardia" class="form-label">Nombre del Guardia</label>
                                <input type="text" class="form-control" id="nombre_guardia" name="nombre_guardia" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="30" required>
                            </div>
                            <div class="mb-3">
                                <label for="observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Registrar Minuta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
