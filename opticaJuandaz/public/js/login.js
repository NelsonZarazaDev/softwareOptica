document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevenir la recarga de la página

        if (email.value.trim() === "" && password.value.trim() === "") {
            Swal.fire({
                title: 'ERROR',
                text: 'INGRESA TU CORREO Y CONTRASEÑA',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        } else if (password.value.trim() === "") {
            Swal.fire({
                title: 'ERROR',
                text: 'INGRESA TU CONTRASEÑA',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        } else if (email.value.trim() === "") {
            Swal.fire({
                title: 'ERROR',
                text: 'INGRESA TU CORREO',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        } else {
            // Si todos los campos están completos, envía el formulario
            form.submit();
        }
    });
});
