<?php
class personalInformationView
{
    function paginatePersonalInformation($array_info)
    {

?>
        <script>
            document.getElementById("textInfo").innerHTML = "Informacion personal";
        </script>

        <div class="card-body">
            <div class="row row-cols-lg-2">
                <div class="col col-lg-3 d-flex ms-lg-3 mt-lg-5 justify-content-center justify-content-lg-end">
                    <img src="public/img/<?php echo $_SESSION['name_access']; ?>.jpg" class="photoInfo img-fluid">
                </div>
                <?php
                $id_access=$array_info[0]['id_access'];
                $id_role=$array_info[0]['id_role'];
                $name_access = $array_info[0]['name_access'];
                $surname_access = $array_info[0]['surname_access'];
                $document_access = $array_info[0]['document_access'];
                $date_birth_access = $array_info[0]['date_birth_access'];
                $date_admission_access = $array_info[0]['date_admission_access'];
                $phone_access = $array_info[0]['phone_access'];
                $years_experience_access = $array_info[0]['years_experience_access'];
                $email_access = $array_info[0]['email_access'];
                $address_access = $array_info[0]['address_access'];
                $sex_access = $array_info[0]['sex_access'];
                $location_departament_id = $array_info[0]['location_departament_id'];
                $location_city_id = $array_info[0]['location_city_id'];
                $role=array('R0000'=>'Secretaria','R0001'=>'Propietaria','R0002'=>'Optometra','R0003'=>'Administrador del sistema');
                $roleSearch=$role[$id_role];
                ?>
                <div class="infoPersonal mt-sm-2">
                    <div><?php echo $name_access." ".$surname_access; ?></div>
                    <div class="textInfo"><?php echo $roleSearch; ?></div>
                    <div class="textInfo">Fecha de ingreso: <?php echo $date_admission_access; ?></div>
                </div>
            </div>
            <hr class="hrInfo">



            <div class="row row-cols-lg-2 ms-sm-1 ms-lg-4">
                <div>
                    <label class="labelInfo">Codigo:</label>
                    <div class="mb-3 infoFields"><?php echo $id_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Nombres:</label>
                    <div class="mb-3 infoFields"><?php echo $name_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Apellidos:</label>
                    <div class="mb-3 infoFields"><?php echo $surname_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Documento:</label>
                    <div class="mb-3 infoFields"><?php echo $document_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Fecha de nacimiento:</label>
                    <div class="mb-3 infoFields"><?php echo $date_birth_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Tel&eacute;fono:</label>
                    <div class="mb-3 infoFields"><?php echo $phone_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">A&ntilde;os de experiencia:</label>
                    <div class="mb-3 infoFields"><?php echo $years_experience_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Email:</label>
                    <div class="mb-3 infoFields"><?php echo $email_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Direcci&oacute;n:</label>
                    <div class="mb-3 infoFields"><?php echo $address_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Sexo:</label>
                    <div class="mb-3 infoFields"><?php echo $sex_access; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Ciudad:</label>
                    <div class="mb-3 infoFields"><?php echo $location_city_id; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Departamento:</label>
                    <div class="mb-3 infoFields"><?php echo $location_departament_id; ?></div>
                </div>
            </div>
        </div>



<?php
    }
}
