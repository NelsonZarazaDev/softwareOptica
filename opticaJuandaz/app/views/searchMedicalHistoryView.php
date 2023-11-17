<?php
class searchMedicalHistoryView
{
    function paginateSearchMedicalHistory()
    {
?>
        <div class="card-body mt-4">
            <form id="formSearch">
                <div class="input-group position-static justify-content-end">
                    <input type="text" id="search" name="search" class="inputSearch p-2" placeholder="Documento">
                    <span class="input-group-text" id="">
                        <button type="button" class="search" onclick="Administrador.search()">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <script>
            document.getElementById("textInfo").innerHTML = "Buscar Historias clinicas";
        </script>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Documento</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Nombre</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Telefono</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Edad</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Fecha de nacimiento</th>
                        <th class="textTableHeaderSearch" style="text-align:center; background-color:#cbedf6;">Ver</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <script src="public/js/function.js"></script>
<?php
    }
}
