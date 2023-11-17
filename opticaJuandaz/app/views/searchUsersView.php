<?php
class searchUsersView
{
    function paginateSearchUsers($array_searchUsers)
    {
?>
        <div class="card-body mt-4">
            <form id="formSearch">
                <div class="input-group position-static justify-content-end">
                    <input type="text" id="search" name="search" class="inputSearch p-2" placeholder="Codigo, Documento, Email">
                    <span class="input-group-text" id="">
                        <button type="button" class="search" onclick="Administrador.search()">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <script>
            document.getElementById("textInfo").innerHTML = "Buscar Usuarios";
        </script>
        <br>
        <div class="table-responsive"> 
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Nombre</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Apellido</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Rol</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Documento</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Telefono</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Fecha ingreso</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Correo</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Direccion</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Sexo</td>
                        <td class="textTableHeaderSearch" style=" background-color:#cbedf6;">Estado</td>
                        <td class="textTableHeaderSearch" style="text-align:center; background-color:#cbedf6;">Acci&oacute;n</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array_searchUsers as $object_searchUsers) {
                        $name_role = $object_searchUsers['name_role'];
                        $name_access = $object_searchUsers['name_access'];
                        $surname_access = $object_searchUsers['surname_access'];
                        $document_access = $object_searchUsers['document_access'];
                        $date_admission_access = $object_searchUsers['date_admission_access'];
                        $phone_access = $object_searchUsers['phone_access'];
                        $email_access = $object_searchUsers['email_access'];
                        $address_access = $object_searchUsers['address_access'];
                        $sex_access = $object_searchUsers['sex_access'];
                        $status_access = $object_searchUsers['status_access'];
                        $token_access = $object_searchUsers['token_access'];
                    ?>
                        <tr class="text-center">
                            <td class="textTableSearch text-start"><?php echo $name_access; ?></td>
                            <td class="textTableSearch text-start"><?php echo $surname_access; ?></td>
                            <td class="textTableSearch"><?php echo $name_role; ?></td>
                            <td class="textTableSearch"><?php echo $document_access; ?></td>
                            <td class="textTableSearch"><?php echo $phone_access; ?></td>
                            <td class="textTableSearch"><?php echo $date_admission_access; ?></td>
                            <td class="textTableSearch text-start"><?php echo $email_access; ?></td>
                            <td class="textTableSearch"><?php echo $address_access; ?></td>
                            <td class="textTableSearch"><?php echo $sex_access; ?></td>
                            <td class="textTableSearch"><?php echo $status_access; ?></td>
                            <td class="textTableSearch" style="text-align:center;"><i class="bi bi-pencil-square" onclick="Administrador.showSearchUsers('<?php echo $token_access ?>')"></i></td>
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
    function showSearchUsers($array_searchUsers, $array_role)
    {
        $name_access = $array_searchUsers[0]['name_access'];
        $surname_access = $array_searchUsers[0]['surname_access'];
        $document_access = $array_searchUsers[0]['document_access'];
        $id_role = $array_searchUsers[0]['id_role'];
        $date_birth_access = $array_searchUsers[0]['date_birth_access'];
        $date_admission_access = $array_searchUsers[0]['date_admission_access'];
        $phone_access = $array_searchUsers[0]['phone_access'];
        $years_experience_access = $array_searchUsers[0]['years_experience_access'];
        $email_access = $array_searchUsers[0]['email_access'];
        $address_access = $array_searchUsers[0]['address_access'];
        $sex_access = $array_searchUsers[0]['sex_access'];
        $password_access = $array_searchUsers[0]['password_access'];
        $status_access = $array_searchUsers[0]['status_access'];
        $name_role=$array_searchUsers[0]['name_role'];
        $token_access = $array_searchUsers[0]['token_access'];
    ?>
        <div class="card">
            <div class="card-body">
                <form id="update_User" class="row gx-5 gy-3">
                    <input type="hidden" class="form-control textUpdateSearch" textUpdateSearch" id="token_access" name="token_access" value="<?php echo $token_access; ?>" readonly>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Nombres</label>
                        <input type="text" class="form-control textUpdateSearch" textUpdateSearch" id="name" name="name" value="<?php echo $name_access; ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Apellidos</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" name" name="name" value="<?php echo $surname_access;  ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Documento</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" document_access" name="document_access" value="<?php echo $document_access;  ?>" readonly>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Rol</label>
                        <select id="id_role" name="id_role" class="form-control p-2" required>
                        <option value="<?php echo $id_role; ?>"><?php echo $name_role; ?></option>
                            <?php
                            if ($array_role) {
                                foreach ($array_role as $object_role) {
                                    $id_role = $object_role['id_role'];
                                    $name_role = $object_role['name_role'];
                            ?>
                                    <option class="textInputCreate p-2" value="<?php echo $id_role; ?>"><?php echo $name_role; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Telefono</label>
                        <input type="number" class="form-control textUpdateSearch"" id=" phone_access" name="phone_access" value="<?php echo $phone_access;  ?>" maxlength="10">
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Correo</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" email_access" name="email_access" value="<?php echo $email_access; ?>">
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Direccion</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" address_access" name="address_access" value="<?php echo $address_access; ?>" maxlength="50">
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Estado</label>
                        <select id="status_access" name="status_access" class="form-control p-2" required>
                            <option class="p-2" value="<?php echo $status_access; ?>"><?php echo $status_access; ?></option>
                            <option class="p-2" value="t">Activo</option>
                            <option class="p-2" value="f">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Contrase&ntildea</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" password_access" name="password_access" value="<?php echo $password_access;  ?>">
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Fecha de nacimiento</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" name" name="name" value="<?php echo $date_birth_access;  ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">Fecha ingreso</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" name" name="name" value="<?php echo $date_admission_access;  ?>" readonly>
                    </div>
                    <div class="col-lg-6 d-flex flex-column ">
                        <label class="textUpdateSearchLabel">sexo</label>
                        <input type="text" class="form-control textUpdateSearch"" id=" name" name="name" value="<?php echo $sex_access;  ?>" readonly>
                    </div>
            </div>
            <input type="hidden" id="token_access" name="token_access" value="<?php echo $token_access;  ?>">
            <input type="hidden" id="id_role" name="id_role" value="<?php echo $id_role;  ?>">
            <input type="hidden" id="phone_access" name="phone_access" value="<?php echo $phone_access;  ?>">
            <input type="hidden" id="email_access" name="email_access" value="<?php echo $email_access;  ?>">
            <input type="hidden" id="address_access" name="address_access" value="<?php echo $address_access;  ?>">
            <input type="hidden" id="status_access" name="status_access" value="<?php echo $status_access;  ?>">
            <input type="hidden" id="password_access" name="password_access" value="<?php echo $password_access;  ?>">


            <button type="button" class="align-items-center m-2 col-10 col-lg-4 d-flex mt-2 p-2 justify-content-center buttonSearch" onclick="Administrador.updateSearchUsers()">
                <i class="bi bi-floppy me-2 ms-2"></i> Guardar
            </button>

            </form>
        </div>
        </div>
<?php
    }
}
?>