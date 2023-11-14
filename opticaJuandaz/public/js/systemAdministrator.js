class systemAdministratorJs {
  insertUser() {
    const name = document.getElementById("name");
    const id_city = document.getElementById("id_city");
    const id_departament = document.getElementById("id_departament");
    const id_role = document.getElementById("id_role");
    const password = document.getElementById("password");
    const sex = document.getElementById("sex");
    const address = document.getElementById("address");
    const email = document.getElementById("email");
    const years_experience = document.getElementById("years_experience");
    const phone = document.getElementById("phone");
    const admission = document.getElementById("admission");
    const birth_date = document.getElementById("birth_date");
    const documento = document.getElementById("document");
    const surname = document.getElementById("surname");
    const photo_person = document.getElementById("photo_person");
    const currentDate = new Date();
    const birthDate = new Date(birth_date.value);
    const differenceInMs = currentDate - birthDate;
    const age = differenceInMs / 1000 / 60 / 60 / 24 / 365;

    function mostrarAlertaCampoVacio(campo) {
      Swal.fire({
        title: "ERROR",
        text: "Hay campos vacíos",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    }

    const isAnyFieldEmpty = (
      name.value.trim() === "" ||
      id_city.value.trim() === "" ||
      id_departament.value.trim() === "" ||
      id_role.value.trim() === "" ||
      password.value.trim() === "" ||
      sex.value.trim() === "" ||
      address.value.trim() === "" ||
      email.value.trim() === "" ||
      years_experience.value.trim() === "" ||
      phone.value.trim() === "" ||
      admission.value.trim() === "" ||
      birth_date.value.trim() === "" ||
      documento.value.trim() === "" ||
      surname.value.trim() === ""
    );

    if (isAnyFieldEmpty) {
      Swal.fire({
        title: "ERROR",
        text: "Hay campos vacíos",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    const nombreValido = /^[A-Za-zÁáÉéÍíÓóÚúÑñüÜ\s]+$/.test(name.value.trim());
    const apellidosValidos = /^[A-Za-zÁáÉéÍíÓóÚúÑñüÜ\s]+$/.test(
      surname.value.trim()
    );

    function isValidText(text) {
      return /^[A-Za-zÁáÉéÍíÓóÚúÑñüÜ\s]+$/.test(text);
    }

    function mostrarMensajeError(campo, mensaje) {
      const errorMessage = document.getElementById(`${campo}-error-message`);
      errorMessage.textContent = mensaje;
      errorMessage.style.color = "red";
    }

    function quitarMensajeError(campo) {
      const errorMessage = document.getElementById(`${campo}-error-message`);
      errorMessage.textContent = "";
      const inputField = document.getElementById(campo);
      inputField.style.borderColor = "";
    }

    function isValidDocumentFormat(documento) {
      return /^[0-9]{10}$/.test(documento);
    }

    function isValidTelephone(phone) {
      return /^[0-9]{10}$/.test(phone);
    }

    name.addEventListener("input", function () {
      if (/[0-9]/.test(name.value)) {
        mostrarMensajeError("name", "Solo se permiten letras.");
        name.style.borderColor = "red";
      } else {
        quitarMensajeError("name");
      }
    });

    surname.addEventListener("input", function () {
      if (/[0-9]/.test(surname.value)) {
        mostrarMensajeError("surname", "Solo se permiten letras.");
        surname.style.borderColor = "red";
      } else {
        quitarMensajeError("surname");
      }
    });

    if (!isValidTelephone(phone.value)) {
      const phoneLength = phone.value.length;
      Swal.fire({
        title: "ERROR",
        text: 'El campo "Telefono" debe contener exactamente 10 dígitos.',
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    } else if (!isValidDocumentFormat(documento.value)) {
      const documentLength = documento.value.length;
      Swal.fire({
        title: "ERROR",
        text: 'El campo "Documento" debe contener exactamente 10 dígitos.',
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    } else if (age < 15) {
      Swal.fire({
        title: "ERROR",
        text: "La fecha de nacimiento debe ser al menos 15 años antes de la fecha actual.",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    } else if (/[0-9]/.test(name.value)) {
      Swal.fire({
        title: "ERROR",
        text: "EL NOMBRE NO PUEDE CONTENER NUMEROS",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    } else if (/[0-9]/.test(surname.value)) {
      Swal.fire({
        title: "ERROR",
        text: "EL APELLIDO NO PUEDE CONTENER NUMEROS",
        icon: "error",
        confirmButtonText: "Aceptar",
      });
      return;
    } else if (name.value.trim() === "") {
      mostrarAlertaCampoVacio("Nombre");
      return;
    } else if (id_city.value.trim() === "") {
      mostrarAlertaCampoVacio("Ciudad");
      return;
    } else if (id_departament.value.trim() === "") {
      mostrarAlertaCampoVacio("Departamento");
      return;
    } else if (id_role.value.trim() === "") {
      mostrarAlertaCampoVacio("Rol");
      return;
    } else if (password.value.trim() === "") {
      mostrarAlertaCampoVacio("Contraseña");
      return;
    } else if (sex.value.trim() === "") {
      mostrarAlertaCampoVacio("Sexo");
      return;
    } else if (address.value.trim() === "") {
      mostrarAlertaCampoVacio("Dirección");
      return;
    } else if (email.value.trim() === "") {
      mostrarAlertaCampoVacio("Correo");
      return;
    } else if (years_experience.value.trim() === "") {
      mostrarAlertaCampoVacio("Años de experiencia");
      return;
    } else if (phone.value.trim() === "") {
      mostrarAlertaCampoVacio("Telefono");
      return;
    } else if (admission.value.trim() === "") {
      mostrarAlertaCampoVacio("Fecha de ingreso");
      return;
    } else if (birth_date.value.trim() === "") {
      mostrarAlertaCampoVacio("Fecha de nacimiento");
      return;
    } else if (documento.value.trim() === "") {
      mostrarAlertaCampoVacio("Documento");
      return;
    } else if (surname.value.trim() === "") {
      mostrarAlertaCampoVacio("Apellidos");
      return;
    } else {
      var object = new FormData(document.querySelector("#insert_User"));

      fetch("createUsersController/insertUser", {
        method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#content").innerHTML = data;
          toastr.success("el registro fue guardado");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  }

  showSearchUsers(token_access) {
    var object = new FormData();
    object.append("token_access", token_access);
    $("#my_modal").modal("show");
    document.querySelector("#modal_title").innerHTML = "Actualizar Usuario";
    fetch("searchUsersController/showSearchUsers", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        document.querySelector("#modal_content").innerHTML = data;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateSearchUsers() {
    var object = new FormData(document.querySelector("#update_User"));

    fetch("searchUsersController/updateSearchUsers", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#content").innerHTML = data;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  search() {
    var object = new FormData(document.querySelector("#formSearch"));
    fetch("searchUsersController/search", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#content").innerHTML = data;
          toastr.success("Usuario encontrado");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

var Administrador = new systemAdministratorJs();
