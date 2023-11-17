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
                <div class="col col-lg-3 d-flex mb-4 ms-lg-3 mt-lg-4 justify-content-center justify-content-lg-end">
                    <img src="public/img/<?php echo $_SESSION['name_access']; ?>.jpg" class="photoInfo img-fluid">
                </div>
                <?php
                $name_role=$array_info[0]['name_role'];
                $cod_employee=$array_info[0]['cod_employee'];
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
                $name_department = $array_info[0]['name_department'];
                $name_city = $array_info[0]['name_city'];
                ?>
                <div class="infoPersonal mt-sm-2">
                    <div><?php echo $name_access." ".$surname_access; ?></div>
                    <div class="textInfo"><?php echo $name_role; ?></div>
                    <div class="textInfo">Fecha de ingreso: <?php echo $date_admission_access; ?></div>
                </div>
            </div>
            <hr class="hrInfo">



            <div class="row row-cols-lg-3 ms-sm-1 ms-lg-4 g-lg-3">
                <div>
                    <label class="labelInfo">Codigo:</label>
                    <div class="mb-3 infoFields"><?php echo $cod_employee; ?></div>
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
                    <div class="mb-3 infoFields"><?php echo $name_city; ?></div>
                </div>
                <div>
                    <label class="labelInfo">Departamento:</label>
                    <div class="mb-3 infoFields"><?php echo $name_department; ?></div>
                </div>
            </div>
        </div>



<?php
    }
}