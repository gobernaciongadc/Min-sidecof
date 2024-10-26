// JAVASCRIPT PARA MUNICIPIOS

// Notificacion para editar
function editarMensaje() {
    // Coloca aquí el código que deseas ejecutar cuando se haga clic en el botón "guardar"
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
}

const botonGuardar = document.querySelector("#btn-editar"); // Ajusta el selector según tu HTML
if (botonGuardar) {
    botonGuardar.addEventListener("click", editarMensaje);
}


// Notificacion para eliminar
function confirmDelete(deleteUrl) {
    console.log(deleteUrl);
}
