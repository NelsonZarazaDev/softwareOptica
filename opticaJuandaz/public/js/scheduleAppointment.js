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
          Menu.menu(
            "scheduleAppointmentController/paginateScheduleAppointment");
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

  showCheckAppointmentSchedule(token) {
    var object = new FormData();
    object.append("token", token);
    $("#my_modal").modal("show");
    document.querySelector("#modal_title").innerHTML = "Informacion de reserva";
    fetch("checkAppointmentScheduleController/showCheckAppointmentSchedule", {
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
          toastr.success("Reserva Modificada");
          Menu.menu(
            "scheduleAppointmentController/paginateScheduleAppointment"
          );
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  deleteSchedule() {
    var object = new FormData(document.querySelector("#update_schedule"));

    Swal.fire({
      title: "¿Está seguro?",
      text: "¡No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
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
              toastr.success("Reserva eliminada");
              Menu.menu('scheduleAppointmentController/paginateScheduleAppointment')
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    });
  }

  searchDocument() {
    var object = new FormData(document.querySelector("#insert_schedule"));

    fetch("scheduleAppointmentController/searchDocument", {
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

  searchCity() {
    var object = new FormData(document.querySelector("#insert_schedule"));
    fetch("scheduleAppointmentController/searchCity", {
        method: "POST",
        body: object,
    })
        .then((resp) => resp.text())
        .then(function (data) {
            try {
                object = JSON.parse(data);
                toastr.error(object.message);
            } catch (error) {
                // Extract only the HTML for the city dropdown
                var cityDropdownHTML = data.match(/<select.id="id_city".*?<\/select>/s);


                if (cityDropdownHTML) {
                    // Find the city dropdown element
                    var cityDropdown = document.getElementById("id_city");

                    // Save the current selected city
                    var currentSelectedCity = cityDropdown.value;

                    // Update only the city dropdown options
                    cityDropdown.innerHTML = cityDropdownHTML[0];

                    // Set back the previously selected city if it still exists in the new options
                    if (currentSelectedCity) {
                        var optionExists = Array.from(cityDropdown.options).some(option => option.value === currentSelectedCity);
                        if (optionExists) {
                            cityDropdown.value = currentSelectedCity;
                        }
                    }

                } else {
                    toastr.error("Error parsing HTML");
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}



}

var Schedule = new ScheduleJS();
