class branchOfficesJS {
  insertCity() {
    var object = new FormData(document.querySelector("#insert_city"));
    fetch("branchOfficesController/insertCity", {
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
          Menu.menu("branchOfficesController/paginateBranchOffices");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  modalCity(token_sede) {
    var object = new FormData();
    object.append("token_sede", token_sede);
    $("#my_modal").modal("show");
    document.querySelector("#modal_title").innerHTML = "Actualizar sede";
    fetch("branchOfficesController/modalCity", {
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

  updateCity() {
    var object = new FormData(document.querySelector("#updae_city"));

    fetch("branchOfficesController/updateCity", {
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
          toastr.success("El registro fue actualizado");
          Menu.menu('branchOfficesController/paginateBranchOffices');
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  searchCity() {
    var object = new FormData(document.querySelector("#insert_city"));
    fetch("branchOfficesController/searchCity", {
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
}

var branchOffice = new branchOfficesJS();
