class HistoryClinicJs {
  modalHistoryClinic() {
    var object = new FormData();
    $("#my_modal_history").modal("show");
    document.querySelector("#modal_title_history").innerHTML =
      "Crear historia clinica";
    fetch("clinicHistorySecretaryController/modalHistoryClinic", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        document.querySelector("#modal_content_history").innerHTML = data;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  searchDocument() {
    var object = new FormData(document.querySelector("#create_history"));
    fetch("clinicHistorySecretaryController/searchDocument", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#card").innerHTML = data;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  createHistory() {
    var object = new FormData(document.querySelector("#create_history"));
    fetch("clinicHistorySecretaryController/createHistory", {
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
          toastr.success("Historia clinica registrada");
          Menu.menu("clinicHistorySecretaryController/paginateClinicHistory");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  showClinicHistory(token) {
    var object = new FormData();
    object.append("token", token);
    $("#my_modal_history").modal("show");
    document.querySelector("#modal_title_history").innerHTML =
      "Actualizar historia clinica";
    fetch("clinicHistorySecretaryController/showClinicHistory", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        document.querySelector("#modal_content_history").innerHTML = data;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  updateHistory() {
    var object = new FormData(document.querySelector("#update_history"));
    fetch("clinicHistorySecretaryController/updateHistory", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        console.log(data);
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#content").innerHTML = data;
          toastr.success("Historia clinica registrada");
          Menu.menu("clinicHistorySecretaryController/paginateClinicHistory");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  viewClinicHistory(token) {
    var object = new FormData();
    object.append("token", token);
    $("#my_modal_history").modal("show");
    document.querySelector("#modal_title_history").innerHTML =
      "Visualizar historia clinica";
    fetch("searchMedicalHistoryController/viewClinicHistory", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        document.querySelector("#modal_content_history").innerHTML = data;
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  search()
  {
    var object = new FormData(document.querySelector("#formSearch"));
    fetch("searchMedicalHistoryController/search", {
      method: "POST",
      body: object,
    })
      .then((resp) => resp.text())
      .then(function (data) {
        console.log(data);
        try {
          object = JSON.parse(data);
          toastr.error(object.message);
        } catch (error) {
          document.querySelector("#content").innerHTML = data;
          toastr.success("Historia clinica registrada");
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}

var HistoryClinic = new HistoryClinicJs();
