$(document).ready(function () {
  var table = $("#myTable tbody"); // Selecciona solo el cuerpo de la tabla
  var rows = table.find("tr").length;
  var rowsPerPage = 10;
  var currentPage = 0;
  var maxVisiblePages = 5; // Define el número máximo de páginas visibles en la paginación.

  // Función para mostrar la página actual
  function showPage(page) {
    var start = page * rowsPerPage;
    var end = start + rowsPerPage;
    table.find("tr").hide();
    table.find("tr").slice(start, end).show();
    $("#currentPage").text(
      "Página " + (page + 1) + " de " + Math.ceil(rows / rowsPerPage)
    );
  }

  // Control de los botones de paginación
  $("#nextPage").click(function () {
    if (currentPage < rows / rowsPerPage - 1) {
      currentPage++;
      showPage(currentPage);
      updatePagination();
    }
  });

  $("#prevPage").click(function () {
    if (currentPage > 0) {
      currentPage--;
      showPage(currentPage);
      updatePagination();
    }
  });

  // Calcular el número total de páginas
  var totalPages = Math.ceil(rows / rowsPerPage);

  // Función para actualizar los botones de paginación
  function updatePagination() {
    var paginationList = $(".pagination");
    paginationList.empty();

    if (totalPages > 1) {
      // Botón "Anterior"
      var prevButton = $(
        '<a class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></a>'
      );
      prevButton.click(function () {
        if (currentPage > 0) {
          currentPage--;
          showPage(currentPage);
          updatePagination();
        }
      });
      paginationList.append(prevButton);

      // Números de página
      var startPage = 0;
      var endPage = totalPages - 1;

      if (totalPages > maxVisiblePages) {
        // Limitar el número de páginas visibles si hay más de 10 páginas en total.
        startPage = Math.max(0, currentPage - Math.floor(maxVisiblePages / 2));
        endPage = Math.min(totalPages - 1, startPage + maxVisiblePages - 1);

        if (endPage - startPage < maxVisiblePages - 1) {
          startPage = endPage - maxVisiblePages + 1;
        }
      }

      for (var i = startPage; i <= endPage; i++) {
        var pageButton = $(
          '<a><a class="page-link" href="#">' + (i + 1) + "</a></a>"
        );
        pageButton.click(
          (function (pageNumber) {
            return function () {
              currentPage = pageNumber;
              showPage(currentPage);
              updatePagination();
            };
          })(i)
        );
        paginationList.append(pageButton);
      }

      // Botón "Siguiente"
      var nextButton = $(
        '<a class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></a>'
      );
      nextButton.click(function () {
        if (currentPage < totalPages - 1) {
          currentPage++;
          showPage(currentPage);
          updatePagination();
        }
      });
      paginationList.append(nextButton);
    }

    // Actualiza el texto con el número de página actual
    $("#currentPage").text("Página " + (currentPage + 1) + " de " + totalPages);
  }

  // Mostrar la página inicial
  showPage(currentPage);

  // Actualizar los botones de paginación inicialmente
  updatePagination();
});