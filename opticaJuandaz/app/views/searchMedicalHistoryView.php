<?php
class searchMedicalHistoryView
{
    function paginateSearchMedicalHistory($array_searchMedicalHistory)
    {
?>
        <div class="card-body mt-4">
            <form id="formSearch">
                <div class="input-group position-static justify-content-end">
                    <input type="text" id="search" name="search" class="inputSearch p-2" placeholder="Documento">
                    <span class="input-group-text" id="">
                        <button type="button" class="search" onclick="Administrador.buscar()">
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
                <?php
                    foreach ($array_searchMedicalHistory as $object_searchMedicalHistory) {
                        $document_person = $object_searchMedicalHistory['document_person'];
                        $name_person = $object_searchMedicalHistory['name_person'];
                        $phone_person = $object_searchMedicalHistory['phone_person'];
                        $age_person = $object_searchMedicalHistory['age_person'];
                        $birth_date_person = $object_searchMedicalHistory['birth_date_person'];
                        
                    ?>
                        <tr class="text-center">
                            <td class="textTableSearch"><?php echo $document_person; ?></td>
                            <td class="textTableSearch text-start"><?php echo $name_person; ?></td>
                            <td class="textTableSearch"><?php echo  $phone_person ; ?></td>
                            <td class="textTableSearch text-start"><?php echo $age_person ; ?></td>
                            <td class="textTableSearch"><?php echo $birth_date_person; ?></td>
                            <td class="textTableSearch" style="text-align:center;"><i class="bi bi-pencil-square" onclick="Administrador.showSearchMedicalHistory('<?php echo $token_access ?>')"></i></td>
                            </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                </ul>
            </nav>

        </div>
        <script src="public/js/function.js"></script>





    <?php
    }
}
