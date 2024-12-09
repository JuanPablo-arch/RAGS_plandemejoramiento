// Función para mostrar una alerta de éxito
function mostrarAlertaSuccess(mensaje) {
    Swal.fire({
        title: 'Éxito',
        text: mensaje,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// Función para mostrar una alerta de error
function mostrarAlertaError(mensaje) {
    Swal.fire({
        title: 'Error',
        text: mensaje,
        icon: 'error',
        confirmButtonText: 'Intentar nuevamente'
    });
}
