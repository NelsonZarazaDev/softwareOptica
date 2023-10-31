class secretaryJs {
  createUser() {
    var object = new FormData();
    $("#my_modal").modal("show");
    document.querySelector("#modal_title").innerHTML = "Crear historia clinica";
     fetch("clinicHistoryController/createUser", {
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
}
var Secretary = new secretaryJs();
