<?php
class clinicHistorySecretaryView
{
    function paginateClinicHistory($array_history)
    {
?>
        <script>
            document.getElementById("textInfo").innerHTML = "Crear historia clinica";
        </script>

        <div class="card-body d-flex align-items-center flex-column flex-lg-row justify-content-lg-between pb-3 mt-4">


            <button type="button" class="col-12 buttonCreateHistory align-items-center col-lg-2 p-1 d-flex justify-content-center mb-2 ml-2" onclick="HistoryClinic.modalHistoryClinic();">
                <i class="bi bi-person-add me-2 icon"></i> Crear
            </button>


        </div>


        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="text-center">
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">No°</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Documento</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Telefono</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Edad</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Nombre</th>
                        <th class="textTableHeaderSearch" style="background-color:#cbedf6;">Fecha de nacimiento</th>
                        <th class="textTableHeaderSearch" style="text-align:center; background-color:#cbedf6;">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($array_history as $object_history) {
                        $id_medical_history = $object_history['id_medical_history'];
                        $document_person = $object_history['document_person'];
                        $phone_person = $object_history['phone_person'];
                        $age_person = $object_history['age_person'];
                        $name_person = $object_history['name_person'];
                        $surname_person = $object_history['surname_person'];
                        $birth_date_person = $object_history['birth_date_person'];
                        $token_medical_history = $object_history['token_medical_history'];

                    ?>
                        <tr class="text-center">
                            <td><?php echo $id_medical_history; ?></td>
                            <td><?php echo $document_person; ?></td>
                            <td><?php echo $phone_person; ?></td>
                            <td><?php echo $age_person; ?></td>
                            <td><?php echo $name_person . " " . $surname_person; ?></td>
                            <td><?php echo $birth_date_person; ?></td>
                            <td class="textTableSearch" style="text-align:center;">
                                <i class="bi bi-pencil-square" onclick="HistoryClinic.showClinicHistory('<?php echo $token_medical_history; ?>')"></i>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            </ul>
        </nav>
        <script src="public/js/function.js"></script>



    <?php
    }

    function modalHistoryClinic($array_secretary_history, $array_department, $array_city, $array_optometrist)
    {
    ?>
        <div class="card" id="card">
            <div class="card-body">
                <form id="create_history"">

                <input type="hidden" id="tokenHistorySecretary" name="tokenHistorySecretary" value="<?php echo $array_secretary_history[0]['token_person']; ?>">

                    <input type="hidden" id="idPersonHistory" name="idPersonHistory" value="<?php echo $array_secretary_history[0]['id_person']; ?>">


                    <div class=" row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Documento</label>
                            <input type="text" name="documentHistory" id="documentHistory" value="<?php echo ($array_secretary_history[0]['document_person']) ?>" class="form-control inputMedicalHistory" onchange="HistoryClinic.searchDocument()">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres</label>
                            <input type="text" name="nameHistory" id="nameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['name_person']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos</label>
                            <input type="text" name="surnameHistory" id="surnameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['surname_person']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono</label>
                            <input type="text" name="phoneHistory" id="phoneHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['phone_person']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Direccion</label>
                            <input type="text" name="addressHistory" id="addressHistory" value="<?php echo ($array_secretary_history[0]['address_person']) ?>" class="form-control inputMedicalHistory">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Fecha de nacimiento</label>
                            <input type="date" name="birthDateHistory" id="birthDateHistory" value="<?php echo ($array_secretary_history[0]['birth_date_person']) ?>" class="form-control inputMedicalHistory">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Entidad</label>
                            <input type="text" name="healthcareEntityHistory" id="healthcareEntityHistory" value="<?php echo ($array_secretary_history[0]['healthcare_entity_person']) ?>" class="form-control inputMedicalHistory">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Edad</label>
                            <input type="text" name="ageHistory" id="ageHistory" value="<?php echo $array_secretary_history[0]['age_person']; ?>" class="form-control inputMedicalHistory">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Ocupacion</label>
                            <input type="text" name="occupationHistory" id="occupationHistory" value="<?php echo ($array_secretary_history[0]['occupation_person']) ?>" class="form-control inputMedicalHistory">
                        </div>

                        <div class="d-flex flex-column">
                            <label class="textLabelCreate">Departamento:</label>
                            <select class="textInputCreate textInputSelect p-2" name="id_department" id="id_department" required>
                                <option value="<?php echo $array_secretary_history[0]['location_department_id']; ?>"><?php echo $array_secretary_history[0]['name_department']; ?></option>
                                <?php
                                if ($array_department) {
                                    foreach ($array_department as $object_department) {
                                        $id_department = $object_department['id_department'];
                                        $name_department = $object_department['name_department'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $id_department; ?>"><?php echo $name_department; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="textLabelCreate">Ciudad:</label>
                            <select class="textInputCreate textInputSelect p-2" name="id_city" id="id_city" required>
                                <option value="<?php echo $array_secretary_history[0]['location_city_id']; ?>"><?php echo $array_secretary_history[0]['name_city']; ?></option>
                                <?php
                                if ($array_city) {
                                    foreach ($array_city as $object_city) {
                                        $id_city = $object_city['id_city'];
                                        $name_city = $object_city['name_city'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $id_city; ?>"><?php echo $name_city; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="textLabelCreate">Optometra:</label>
                            <select class="textInputCreate textInputSelect p-2" name="id_optometrist" id="id_optometrist" required>
                                <option value="<?php echo $array_secretary_history[0]['cod_expert']; ?>"><?php echo ($array_secretary_history[0]['name_access']) . " " . ($array_secretary_history[0]['surname_access']); ?></option>

                                <?php
                                if ($array_optometrist) {
                                    foreach ($array_optometrist as $object_optometrist) {
                                        $cod_employee = $object_optometrist['cod_employee'];
                                        $name_access = $object_optometrist['name_access'];
                                        $surname_access = $object_optometrist['surname_access'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $cod_employee; ?>"><?php echo $name_access, " " . $surname_access; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Parentesco acompañante</label>
                            <input type="text" name="relationshipHistory" id="relationshipHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['relationship_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres acompa&ntilde;ante</label>
                            <input type="text" name="nameCompanionHistory" id="nameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['name_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos acompa&ntilde;ante</label>
                            <input type="text" name="surnameCompanionHistory" id="surnameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['surname_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono acompa&ntilde;ante</label>
                            <input type="text" name="phoneCompanionHistory" id="phoneCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['phone_companion']) ?>">
                        </div>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Motivo de consulta</label>
                        <textarea name="reasonQueryHistory" id="reasonQueryHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['reason_history']) ?></textarea>
                    </div>

                    <div class="row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes personales</label>
                            <textarea name="personalHistory" id="personalHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['personal_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes oculares</label>
                            <textarea name="OcularBackgroundHistory" id="OcularBackgroundHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['ocular_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes familiares</label>
                            <textarea name="familyBackgroundHistory" id="familyBackgroundHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['family_history']) ?></textarea>
                        </div>
                    </div>



                    <div class="d-flex">
                        <div class="col-3 mt-3 m-2 card">
                            <label class="textMedicalHistoryLabel m-2">Lensometria</label>
                            <div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OD</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['od_lensometry']) ?>" disabled>
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OI</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['oi_lensometry']) ?>" disabled>
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">ADD</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['add_lensometry']) ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 card">
                            <label class="textMedicalHistoryLabel m-2">Agudeza visual</label>
                            <div class="row row-cols-2 gx-4 gy-2">
                                <div>
                                    <label class="textMedicalHistoryLabel m-2">Lejana</label>
                                    <div class="row row-cols-3 gx-4 gy-2">
                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">SC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div>
                                    <label class="textMedicalHistoryLabel m-2">Cercana</label>
                                    <div class="row row-cols-3 gx-4 gy-2">
                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">SC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['nearvisualacuity_a_od_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearod_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearod_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="d-flex">
                        <div class="card mt-3 mx-2">
                            <label class="textMedicalHistoryLabel m-2">Queratometria</label>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Horizontal</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriahorizontal_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Vertical</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriavertical_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriaeje_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Dif</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriadifferential_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriahorizontal_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriavertical_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriaeje_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriadifferential_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3 mr-3">
                            <label class="textMedicalHistoryLabel m-2">Refraccion</label>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Esfera</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionsphere_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractioncilindro_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaxis_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Adici&oacute;n</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaddition_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionsphere_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractioncilindro_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaxis_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaddition_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <label class="textMedicalHistoryLabel mt-3 m-2">Subjetivo</label>
                    <div class="d-flex card flex-row">
                        <div class="m-auto p-2">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Esfera</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivesphere_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivecylinder_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveeje_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">ADD</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveadd_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">DP</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivedp_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivesphere_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivecylinder_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveeje_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveadd_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivedp_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="textMedicalHistoryLabel">Agudeza Visual</label>
                            <div class="d-flex p-2">
                                <div>
                                    <label class="textMedicalHistoryLabel">Lejos</label>
                                    <div class="d-flex">
                                        <div class="textMedicalHistoryLabel">20/</div>
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancefar_od']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="textMedicalHistoryLabel">20/</div>
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancefar_oi']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="textMedicalHistoryLabel">Cerca</label>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancenear_od']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancenear_oi']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>


                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Observaciones</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['observation']) ?>" disabled></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Recomendaciones</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['recommendation']) ?>" disabled></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Diagnostico</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['diagnostic']) ?>" disabled></textarea>
                    </div>



                    <button type="button" class="align-items-center m-2 col-10 col-lg-4   mt-4 p-2 justify-content-center buttonSearch" onclick="HistoryClinic.createHistory()">
                        <i class="bi bi-floppy me-2 ms-2"></i> Guardar
                    </button>
                </form>
            </div>
        </div>
    <?php }
    function updateModalHistoryClinic($array_secretary_history, $array_department, $array_city, $array_optometrist)
    {
    ?>
        <div class="card" id="card">
            <div class="card-body">
                <form id="update_history"">
        
                    <input type="hidden" id="tokenHistorySecretary" name="tokenHistorySecretary" value="<?php echo $array_secretary_history[0]['token_person']; ?>">
                    <input type="hidden" id="tokenHistory" name="tokenHistory" value="<?php echo $array_secretary_history[0]['token_medical_history']; ?>">

                    <input type="hidden" id="compareEntity" name="compareEntity" value="<?php echo $array_secretary_history[0]['healthcare_entity_person']; ?>">
                    <input type="hidden" id="compareOccupation" name="compareOccupation" value="<?php echo $array_secretary_history[0]['occupation_person']; ?>">
                    <input type="hidden" id="compareDepartment" name="compareDepartment" value="<?php echo $array_secretary_history[0]['location_department_id']; ?>">
                    <input type="hidden" id="compareCity" name="compareCity" value="<?php echo $array_secretary_history[0]['location_city_id']; ?>">
                    <input type="hidden" id="compareRelationship" name="compareRelationship" value="<?php echo $array_secretary_history[0]['relationship_companion']; ?>">
                    <input type="hidden" id="compareNameCompanion" name="compareNameCompanion" value="<?php echo $array_secretary_history[0]['name_companion']; ?>">
                    <input type="hidden" id="compareSurnameCompanion" name="compareSurnameCompanion" value="<?php echo $array_secretary_history[0]['surname_companion']; ?>">
                    <input type="hidden" id="comparePhoneCompanion" name="comparePhoneCompanion" value="<?php echo $array_secretary_history[0]['phone_companion']; ?>">
                    <input type="hidden" id="compareReason" name="compareReason" value="<?php echo $array_secretary_history[0]['reason_history']; ?>">
                    <input type="hidden" id="comparePersonal" name="comparePersonal" value="<?php echo $array_secretary_history[0]['personal_history']; ?>">
                    <input type="hidden" id="compareOcular" name="compareOcular" value="<?php echo $array_secretary_history[0]['ocular_history']; ?>">
                    <input type="hidden" id="compareFamily" name="compareFamily" value="<?php echo $array_secretary_history[0]['family_history']; ?>">


                    <div class=" row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Documento</label>
                            <input type="text" name="documentHistory" id="documentHistory" value="<?php echo ($array_secretary_history[0]['document_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres</label>
                            <input type="text" name="nameHistory" id="nameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['name_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos</label>
                            <input type="text" name="surnameHistory" id="surnameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['surname_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono</label>
                            <input type="text" name="phoneHistory" id="phoneHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['phone_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Direccion</label>
                            <input type="text" name="addressHistory" id="addressHistory" value="<?php echo ($array_secretary_history[0]['address_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Fecha de nacimiento</label>
                            <input type="date" name="birthDateHistory" id="birthDateHistory" value="<?php echo ($array_secretary_history[0]['birth_date_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Edad</label>
                            <input type="text" name="ageHistory" id="ageHistory" value="<?php echo $array_secretary_history[0]['age_person']; ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Entidad</label>
                            <input type="text" name="healthcareEntityHistory" id="healthcareEntityHistory" value="<?php echo ($array_secretary_history[0]['healthcare_entity_person']) ?>" class="form-control inputMedicalHistory">
                        </div>

                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Ocupacion</label>
                            <input type="text" name="occupationHistory" id="occupationHistory" value="<?php echo ($array_secretary_history[0]['occupation_person']) ?>" class="form-control inputMedicalHistory">
                        </div>

                        <div class="d-flex flex-column">
                            <label class="textLabelCreate">Departamento:</label>
                            <select class="textInputCreate textInputSelect p-2" name="id_department" id="id_department" required>
                                <option value="<?php echo $array_secretary_history[0]['location_department_id']; ?>"><?php echo $array_secretary_history[0]['name_department']; ?></option>
                                <?php
                                if ($array_department) {
                                    foreach ($array_department as $object_department) {
                                        $id_department = $object_department['id_department'];
                                        $name_department = $object_department['name_department'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $id_department; ?>"><?php echo $name_department; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="textLabelCreate">Ciudad:</label>
                            <select class="textInputCreate textInputSelect p-2" name="id_city" id="id_city" required>
                                <option value="<?php echo $array_secretary_history[0]['location_city_id']; ?>"><?php echo $array_secretary_history[0]['name_city']; ?></option>
                                <?php
                                if ($array_city) {
                                    foreach ($array_city as $object_city) {
                                        $id_city = $object_city['id_city'];
                                        $name_city = $object_city['name_city'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $id_city; ?>"><?php echo $name_city; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-column mt-3">
                            <label class="textLabelCreate">Optometra:</label>
                            <select class="textInputCreate textInputSelect p-2 disabled-select" name="id_optometrist" id="id_optometrist" disabled>
                                <option value="<?php echo $array_secretary_history[0]['cod_expert']; ?>"><?php echo ($array_secretary_history[0]['name_access']) . " " . ($array_secretary_history[0]['surname_access']); ?></option>

                                <?php
                                if ($array_optometrist) {
                                    foreach ($array_optometrist as $object_optometrist) {
                                        $cod_employee = $object_optometrist['cod_employee'];
                                        $name_access = $object_optometrist['name_access'];
                                        $surname_access = $object_optometrist['surname_access'];
                                ?>
                                        <option class="textInputCreate p-2" value="<?php echo $cod_employee; ?>"><?php echo $name_access, " " . $surname_access; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Parentesco acompañante</label>
                            <input type="text" name="relationshipHistory" id="relationshipHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['relationship_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres acompa&ntilde;ante</label>
                            <input type="text" name="nameCompanionHistory" id="nameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['name_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos acompa&ntilde;ante</label>
                            <input type="text" name="surnameCompanionHistory" id="surnameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['surname_companion']) ?>">
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono acompa&ntilde;ante</label>
                            <input type="text" name="phoneCompanionHistory" id="phoneCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['phone_companion']) ?>">
                        </div>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Motivo de consulta</label>
                        <textarea name="reasonQueryHistory" id="reasonQueryHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['reason_history']) ?></textarea>
                    </div>

                    <div class="row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes personales</label>
                            <textarea name="personalHistory" id="personalHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['personal_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes oculares</label>
                            <textarea name="OcularBackgroundHistory" id="OcularBackgroundHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['ocular_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes familiares</label>
                            <textarea name="familyBackgroundHistory" id="familyBackgroundHistory" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_secretary_history[0]['family_history']) ?></textarea>
                        </div>
                    </div>



                    <div class="d-flex">
                        <div class="col-3 mt-3 m-2 card">
                            <label class="textMedicalHistoryLabel m-2">Lensometria</label>
                            <div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OD</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['od_lensometry']) ?>" disabled>
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OI</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['oi_lensometry']) ?>" disabled>
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">ADD</label>
                                    <input type="text" name="" id="" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['add_lensometry']) ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 card">
                            <label class="textMedicalHistoryLabel m-2">Agudeza visual</label>
                            <div class="row row-cols-2 gx-4 gy-2">
                                <div>
                                    <label class="textMedicalHistoryLabel m-2">Lejana</label>
                                    <div class="row row-cols-3 gx-4 gy-2">
                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">SC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityod_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['farvisualacuityoi_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div>
                                    <label class="textMedicalHistoryLabel m-2">Cercana</label>
                                    <div class="row row-cols-3 gx-4 gy-2">
                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">SC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['nearvisualacuity_a_od_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_sc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearod_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_cc']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearod_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualnearoi_ph']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="d-flex">
                        <div class="card mt-3 mx-2">
                            <label class="textMedicalHistoryLabel m-2">Queratometria</label>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Horizontal</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriahorizontal_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Vertical</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriavertical_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriaeje_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Dif</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriadifferential_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriahorizontal_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriavertical_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriaeje_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['keratometriadifferential_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3 mr-3">
                            <label class="textMedicalHistoryLabel m-2">Refraccion</label>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Esfera</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionsphere_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractioncilindro_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaxis_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Adici&oacute;n</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaddition_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionsphere_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractioncilindro_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaxis_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['refractionaddition_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <label class="textMedicalHistoryLabel mt-3 m-2">Subjetivo</label>
                    <div class="d-flex card flex-row">
                        <div class="m-auto p-2">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="justify-content-between mx-2">
                                        <label class="d-flex textMedicalHistoryLabel justify-content-center">Esfera</label>
                                        <div class="d-flex">
                                            <div class="textMedicalHistoryLabel d-flex align-items-center">OD</div>
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivesphere_od']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivecylinder_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveeje_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">ADD</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveadd_od']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">DP</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivedp_od']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivesphere_oi']) ?>" disabled>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivecylinder_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveeje_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectiveadd_oi']) ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['subjectivedp_oi']) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="textMedicalHistoryLabel">Agudeza Visual</label>
                            <div class="d-flex p-2">
                                <div>
                                    <label class="textMedicalHistoryLabel">Lejos</label>
                                    <div class="d-flex">
                                        <div class="textMedicalHistoryLabel">20/</div>
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancefar_od']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="textMedicalHistoryLabel">20/</div>
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancefar_oi']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="textMedicalHistoryLabel">Cerca</label>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancenear_od']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="" id="" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['acuityvisualdistancenear_oi']) ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>


                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Observaciones</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['observation']) ?>" disabled></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Recomendaciones</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['recommendation']) ?>" disabled></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Diagnostico</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control inputMedicalHistory" value="<?php echo ($array_secretary_history[0]['diagnostic']) ?>" disabled></textarea>
                    </div>



                    <button type="button" class="align-items-center m-2 col-10 col-lg-4   mt-4 p-2 justify-content-center buttonSearch" onclick="HistoryClinic.updateHistory()">
                        <i class="bi bi-floppy me-2 ms-2"></i> Actualizar
                    </button>
                </form>
            </div>
        </div>
<?php
    }
}
?>