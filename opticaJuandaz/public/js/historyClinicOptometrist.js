class HistoryClinicOptometristJs {
  updateTokenClinicHistory(token) {
    var object = new FormData();
    object.append("token", token);
    $("#my_modal_history").modal("show");
    document.querySelector("#modal_title_history").innerHTML =
      "Actualizar historia clinica";
    fetch("clinicHistoryOptometristController/updateTokenClinicHistory", {
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
    var object = new FormData(
      document.querySelector("#update_history_optometrist")
    );
    fetch("clinicHistoryOptometristController/updateHistory", {
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
}

var HistoryClinicOptometrist = new HistoryClinicOptometristJs();
