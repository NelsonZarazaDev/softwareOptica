class ScheduleJS {
  insertSchedule() {
    var object = new FormData(document.querySelector("#insert_schedule"));

    fetch("scheduleAppointmentController/insertSchedule", {
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

  showSchedule(token) {
    var object = new FormData();
    object.append("token", token);
    $("#my_modal").modal("show");
    document.querySelector("#modal_title").innerHTML = "Actualizar reserva";
    fetch("scheduleAppointmentController/showSchedule", {
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

  updateSchedule() {
    var object = new FormData(document.querySelector("#update_schedule"));

    fetch("scheduleAppointmentController/updateSchedule", {
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

  deleteSchedule() {
    var object = new FormData(document.querySelector("#update_schedule"));

    fetch("scheduleAppointmentController/deleteSchedule", {
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

var Schedule = new ScheduleJS();
