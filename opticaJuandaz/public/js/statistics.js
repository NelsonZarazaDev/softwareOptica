class statisticsJs {
  searchTod() {
    var inputFecha = document.getElementById("searchTod");
    var valorFecha = inputFecha.value;
    if (valorFecha === null || valorFecha === "") {
      fetch("searchStatisticsController/search", {
        method: "POST",
        body: object,
      })
        .then((resp) => resp.text())
        .then(function (data) {
          try {
            var object = JSON.parse(data);
            toastr.error(object.message);
          } catch (error) {
            document.querySelector("#content").innerHTML = data;
            var countMedicalHistory = parseInt(
              document.getElementById("countMedicalHistory").innerHTML,
              10
            );
            var countQuote = parseInt(
              document.getElementById("countQuote").innerHTML,
              10
            );
            var dataArray = {
              nameAccess: [],
              documentAccess: [],
              quantityClinicalStories: [],
              reservesQuantity: [],
            };

            setTimeout(function () {
              var scriptTag = document.querySelector("#content script");
              if (scriptTag) {
                window.eval(scriptTag.textContent);
                if (Array.isArray(secretaryData) && secretaryData.length > 0) {
                  secretaryData.forEach(function (item) {
                    dataArray.nameAccess.push(item.name_access);
                    dataArray.documentAccess.push(item.document_access);
                    dataArray.quantityClinicalStories.push(
                      item.quantity_clinical_stories
                    );
                    dataArray.reservesQuantity.push(item.reserves_quantity);
                  });
                }
                updatePieChartData(
                  countMedicalHistory,
                  countQuote,
                  dataArray,
                  dataOptometry
                );
                toastr.error("Campo vacio");
              }
            }, 100);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    } 


    
    else {
      var object = new FormData(document.querySelector("#formSearchTod"));
      fetch("searchStatisticsController/searchTod", {
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
            var countMedicalHistory = document.getElementById(
              "countMedicalHistory"
            );
            var countMedicalHistory = parseInt(
              countMedicalHistory.innerHTML,
              10
            );
            var countQuote = document.getElementById("countQuote");
            var countQuote = parseInt(countQuote.innerHTML, 10);
            var dataArray = {
              nameAccess: [],
              documentAccess: [],
              quantityClinicalStories: [],
              reservesQuantity: [],
            };
            var dataOptometry = {
              nameAccess: [],
              documentAccess: [],
              quantityClinicalStories: [],
            };

            setTimeout(function () {
              var scriptTag = document.querySelector("#content script");
              if (scriptTag) {
                window.eval(scriptTag.textContent);

                if (Array.isArray(secretaryData) && secretaryData.length > 0) {
                  secretaryData.forEach(function (item) {
                    dataArray.nameAccess.push(item.name_access);
                    dataArray.documentAccess.push(item.document_access);
                    dataArray.quantityClinicalStories.push(
                      item.quantity_clinical_stories
                    );
                    dataArray.reservesQuantity.push(item.reserves_quantity);
                  });
                }

                if (Array.isArray(optometristData) && optometristData.length > 0){
                  optometristData.forEach(function (item) {
                    dataOptometry.nameAccess.push(item.name_access);
                    dataOptometry.documentAccess.push(item.document_access);
                    dataOptometry.quantityClinicalStories.push(item.quantity_clinical_stories);
                  });
                }




                updatePieChartData(
                  countMedicalHistory,
                  countQuote,
                  dataArray,
                  dataOptometry
                );
                toastr.success("Estadisticas Actualizadas");
              }
            }, 100);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }


}
var Statistics = new statisticsJs();