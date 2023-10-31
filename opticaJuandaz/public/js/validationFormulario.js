function validationFormulario() {
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var email = document.getElementById("email");
    var direccion = document.getElementById("direccion");
    var password = document.getElementById("password");

    var errorNombre = document.getElementById("error-nombre");
    var errorApellidos = document.getElementById("error-apellidos");
    var errorEmail = document.getElementById("error-email");
    var errorDireccion = document.getElementById("error-direccion");
    var errorPassword = document.getElementById("error-password");

    errorNombre.innerHTML = "";
    errorApellidos.innerHTML = "";
    errorEmail.innerHTML = "";
    errorDireccion.innerHTML = "";
    errorPassword.innerHTML = "";

    var valido = true;

    if (nombre.value.trim() === "") {
        errorNombre.innerHTML = "El nombre es obligatorio.";
        valido = false;
    }

    if (apellidos.value.trim() === "") {
        errorApellidos.innerHTML = "Los apellidos son obligatorios.";
        valido = false;
    }

    if (email.value.trim() === "") {
        errorEmail.innerHTML = "El correo es obligatorio.";
        valido = false;
    }

    if (direccion.value.trim() === "") {
        errorDireccion.innerHTML = "La dirección es obligatoria.";
        valido = false;
    }

    if (password.value.trim() === "") {
        errorPassword.innerHTML = "La contraseña es obligatoria.";
        valido = false;
    }

    return valido;
}