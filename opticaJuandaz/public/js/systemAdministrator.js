class systemAdministratorJs {
  insertUser() {
    var object = new FormData(document.querySelector("#insert_User"));
    fetch("createUsersController/insertUser", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {

          const responseObject = JSON.parse(data.trim());
          if (responseObject.error) {
            toastr.error(responseObject.message);
          } else {
            document.querySelector("#content").innerHTML = data;
            toastr.success("El registro fue guardado");
          }
      })
      .catch((error) => {
        toastr.success("El registro fue guardado");
        Menu.menu('createUsersController/paginateCreateUsers')
      });
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
          toastr.success("El registro fue guardado");
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