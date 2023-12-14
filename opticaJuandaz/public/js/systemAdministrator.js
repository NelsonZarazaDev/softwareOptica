class systemAdministratorJs {
  insertUser() {
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
          Menu.menu("createUsersController/paginateCreateUsers");
        }
      })
      .catch(function (error) {
        console.log(error);
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

searchCity() {
  var object = new FormData(document.querySelector("#insert_User"));
  fetch("searchCityController/searchCity", {
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
        var cityDropdownHTML = data.match(
          /<select.id="id_city".*?<\/select>/s
        );

        if (cityDropdownHTML) {
          // Find the city dropdown element
          var cityDropdown = document.getElementById("id_city");

          // Save the current selected city
          var currentSelectedCity = cityDropdown.value;

          // Update only the city dropdown options
          cityDropdown.innerHTML = cityDropdownHTML[0];

          // Set back the previously selected city if it still exists in the new options
          if (currentSelectedCity) {
            var optionExists = Array.from(cityDropdown.options).some(
              (option) => option.value === currentSelectedCity
            );
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

var Administrador = new systemAdministratorJs();
