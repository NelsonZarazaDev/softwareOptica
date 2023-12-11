<?php
class branchOfficesView
{
    function paginateBranchOffices($array_sede_city)
    {
?>
        <script>
            document.getElementById("textInfo").innerHTML = "Crear Sucursales";
        </script>

        <div class="card-body pt-5">
            <form id="insert_city">
                <div class="row row-cols-1 row-cols-md-3 g-3 text-sm-start">
                    <div class="col d-flex flex-sm-column justify-content-between">
                        <label for="nombre" class="textLabelCreate">Ciudad:</label>
                        <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="city" name="city" required>
                        <div class="error" id="error-nombre"></div>
                    </div>
                    <div class="col d-flex flex-sm-column justify-content-between">
                        <label for="apellidos" class="textLabelCreate">Direccion:</label>
                        <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="address" name="address" required>
                        <div class="error" id="error-apellidos"></div>
                    </div>


                    <div class="col justify-content-lg-start mt-4">
                        <button type="button" class="align-items-center buttonUserRegister col-8 col-lg-6 p-2 d-flex justify-content-center" onclick="branchOffice.insertCity()"><i class="bi bi-person-plus me-2"></i>Crear</button>
                    </div>

            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mt-5" id="myTable">
                <thead>
                    <tr>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Codigo</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Ciudad</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Direccion</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Estado</td>
                        <td class="textTableHeaderSearch" style="text-align:center; background-color:#cbedf6;">Acci&oacute;n</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array_sede_city as $object_sedeCity) {
                        $id_sede_city = $object_sedeCity['id_sede_city'];
                        $name_city = $object_sedeCity['name_city'];
                        $sede_address = $object_sedeCity['sede_address'];
                        $sede_state = $object_sedeCity['sede_state'];
                        $token_sede = $object_sedeCity['token_sede'];

                    ?>
                        <tr class="text-center">
                            <td class="textTableSearch text-center"><?php echo $id_sede_city; ?></td>
                            <td class="textTableSearch text-center"><?php echo $name_city; ?></td>
                            <td class="textTableSearch text-center"><?php echo $sede_address; ?></td>
                            <td class="textTableSearch"><?php echo $sede_state; ?></td>
                            <td class="textTableSearch" style="text-align:center;"><i class="bi bi-pencil-square" onclick="branchOffice.modalCity('<?php echo $token_sede ?>')"></i></td>
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

    <?php }
    function paginateModelSede($array_updateSede)
    {
    ?>
        <div class="card-body">
            <form id="updae_city">
                <div class="row row-cols-1 row-cols-md-3 g-3 text-sm-start">
                    <input type="hidden" name="token" value="<?php echo $array_updateSede[0]['token_sede'] ?>">
                    <input type="hidden" name="currentName" value="<?php echo $array_updateSede[0]['name_city'] ?>">
                    <input type="hidden" name="currentAddress" value="<?php echo $array_updateSede[0]['sede_address'] ?>">
                    <input type="hidden" name="currentState" value="<?php echo $array_updateSede[0]['sede_state'] ?>">

                    <div class="col d-flex flex-sm-column justify-content-between">
                        <label for="nombre" class="textLabelCreate">Ciudad:</label>
                        <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="city" name="city" required value="<?php echo $array_updateSede[0]['name_city'] ?>">
                        <div class="error" id="error-nombre"></div>
                    </div>

                    <div class="col d-flex flex-sm-column justify-content-between">
                        <label for="apellidos" class="textLabelCreate">Direccion:</label>
                        <input type="text" class="textInputCreate col-8 col-lg-10 p-2" id="address" name="address" required value="<?php echo $array_updateSede[0]['sede_address'] ?>">
                        <div class="error" id="error-apellidos"></div>
                    </div>

                    <div class="d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Estado</label>
                        <select id="status" name="status" class="form-control p-2" required>
                            <option class="p-2" value="<?php echo $array_updateSede[0]['sede_state'] ?>"><?php echo $array_updateSede[0]['sede_state'] ?></option>
                            <option class="p-2" value="t">Activo</option>
                            <option class="p-2" value="f">Inactivo</option>
                        </select>
                    </div>

                    <div class="col justify-content-lg-start mt-4">
                        <button type="button" class="align-items-center buttonUserRegister col-8 col-lg-6 p-2 d-flex justify-content-center" onclick="branchOffice.updateCity()"><i class="bi bi-person-plus me-2"></i>Actualizar</button>
                    </div>

            </form>
        </div>
<?php
    }
} ?>