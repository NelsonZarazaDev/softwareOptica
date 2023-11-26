<?php
class clinicHistoryOptometristView
{
    function paginateClinicHistory($array_history)
    {
?>
        <script>
            document.getElementById("textInfo").innerHTML = "Crear historia clinica";
        </script>

        <div class="table-responsive pt-5">
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
                        $hour_history = $object_history['hour_history'];
                        date_default_timezone_set('America/Bogota');
                        $currentTime = new DateTime();
                        $hour_historyObject = new DateTime($hour_history);
                        $difference = $currentTime->diff($hour_historyObject);
                        $subtraction = $difference->format('%H:%i:%s');

                    ?>
                        <tr class="text-center">
                            <td><?php echo $id_medical_history; ?></td>
                            <td><?php echo $document_person; ?></td>
                            <td><?php echo $phone_person; ?></td>
                            <td><?php echo $age_person; ?></td>
                            <td><?php echo $name_person . " " . $surname_person; ?></td>
                            <td><?php echo $birth_date_person; ?></td>
                            <td class="textTableSearch" style="text-align:center;">
                                <?php if ($subtraction < '02:00:0') { ?>
                                    <i class="bi bi-pencil-square" onclick="HistoryClinicOptometrist.updateTokenClinicHistory('<?php echo $token_medical_history; ?>')"></i>
                                <?php } else { ?>
                                    <i class="bi bi-eye-fill" onclick="HistoryClinic.viewClinicHistory('<?php echo $token_medical_history; ?>')"></i>
                                <?php } ?>
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

    function modalHistoryClinic($array_optometrist_history)
    {
    ?>
        <div class="card" id="card">
            <div class="card-body">
                <form id="update_history_optometrist"">
                <input type="hidden" id="token_medical_history" name="token_medical_history" value="<?php echo $array_optometrist_history[0]['token_medical_history']; ?>">


                    <div class="row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Documento</label>
                            <input type="text" name="documentHistory" id="documentHistory" value="<?php echo ($array_optometrist_history[0]['document_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres</label>
                            <input type="text" name="nameHistory" id="nameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['name_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos</label>
                            <input type="text" name="surnameHistory" id="surnameHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['surname_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono</label>
                            <input type="text" name="phoneHistory" id="phoneHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['phone_person']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Direccion</label>
                            <input type="text" name="addressHistory" id="addressHistory" value="<?php echo ($array_optometrist_history[0]['address_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Fecha de nacimiento</label>
                            <input type="date" name="birthDateHistory" id="birthDateHistory" value="<?php echo ($array_optometrist_history[0]['birth_date_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Entidad</label>
                            <input type="text" name="healthcareEntityHistory" id="healthcareEntityHistory" value="<?php echo ($array_optometrist_history[0]['healthcare_entity_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Edad</label>
                            <input type="text" name="ageHistory" id="ageHistory" value="<?php echo $array_optometrist_history[0]['age_person']; ?>" class="form-control inputMedicalHistory" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Ocupacion</label>
                            <input type="text" name="occupationHistory" id="occupationHistory" value="<?php echo ($array_optometrist_history[0]['occupation_person']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>

                        <div class="d-flex flex-column">
                            <label class="textLabelCreate">Departamento:</label>
                            <input type="text" name="id_department" id="id_department" value="<?php echo $array_optometrist_history[0]['name_department'] ?>" class="form-control inputMedicalHistory" disabled>

                        </div>

                        <div class="d-flex flex-column">
                            <label class="textLabelCreate">Ciudad:</label>
                            <input type="text" name="id_city" id="id_city" value="<?php echo $array_optometrist_history[0]['name_city'] ?>" class="form-control inputMedicalHistory" disabled>
                        </div>

                        <div class="d-flex flex-column">
                            <label class="textLabelCreate">Optometra:</label>
                            <input type="text" name="id_optometrist" id="id_optometrist" value="<?php echo ($array_optometrist_history[0]['name_access']) . " " . ($array_optometrist_history[0]['surname_access']) ?>" class="form-control inputMedicalHistory" disabled>
                        </div>

                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Parentesco acompañante</label>
                            <input type="text" name="relationshipHistory" id="relationshipHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['relationship_companion']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Nombres acompa&ntilde;ante</label>
                            <input type="text" name="nameCompanionHistory" id="nameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['name_companion']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Apellidos acompa&ntilde;ante</label>
                            <input type="text" name="surnameCompanionHistory" id="surnameCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['surname_companion']) ?>" disabled>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Telefono acompa&ntilde;ante</label>
                            <input type="text" name="phoneCompanionHistory" id="phoneCompanionHistory" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['phone_companion']) ?>" disabled>
                        </div>
                    </div>
 
                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Motivo de consulta</label>
                        <textarea name="reason_history" id="reason_history" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_optometrist_history[0]['reason_history']) ?></textarea>
                    </div>

                    <div class="row row-cols-3 gx-4 gy-2">
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes personales</label>
                            <textarea name="personal_history" id="personal_history" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_optometrist_history[0]['personal_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes oculares</label>
                            <textarea name="ocular_history" id="ocular_history" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_optometrist_history[0]['ocular_history']) ?></textarea>
                        </div>
                        <div class="justify-content-between">
                            <label class="textMedicalHistoryLabel">Antecedentes familiares</label>
                            <textarea name="family_history" id="family_history" cols="10" rows="5" class="form-control inputMedicalHistory"><?php echo ($array_optometrist_history[0]['family_history']) ?></textarea>
                        </div>
                    </div>



                    <div class="d-flex">
                        <div class="col-3 mt-3 m-2 card">
                            <label class="textMedicalHistoryLabel m-2">Lensometria</label>
                            <div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OD</label>
                                    <input type="text" name="od_lensometry" id="od_lensometry" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['od_lensometry']) ?>">
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">OI</label>
                                    <input type="text" name="oi_lensometry" id="oi_lensometry" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['oi_lensometry']) ?>">
                                </div>
                                <div class="d-flex m-2 align-items-center">
                                    <label class="textMedicalHistoryLabel m-2">ADD</label>
                                    <input type="text" name="add_lensometry" id="add_lensometry" class="form-control inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['add_lensometry']) ?>">
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
                                                    <input type="text" name="farvisualacuityod_sc" id="farvisualacuityod_sc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityod_sc']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="farvisualacuityoi_sc" id="farvisualacuityoi_sc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityoi_sc']) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="farvisualacuityod_cc" id="farvisualacuityod_cc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityod_cc']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="farvisualacuityoi_cc" id="farvisualacuityoi_cc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityoi_cc']) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="farvisualacuityod_ph" id="farvisualacuityod_ph" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityod_ph']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="farvisualacuityoi_ph" id="farvisualacuityoi_ph" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['farvisualacuityoi_ph']) ?>">
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
                                                    <input type="text" name="nearvisualacuity_a_od_sc" id="nearvisualacuity_a_od_sc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['nearvisualacuity_a_od_sc']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="acuityvisualnearoi_sc" id="acuityvisualnearoi_sc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualnearoi_sc']) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">CC</label>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="acuityvisualnearod_cc" id="acuityvisualnearod_cc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualnearod_cc']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="mx-2 textMedicalHistoryLabel d-flex align-items-center">20/</div>
                                                <div class="justify-content-between">
                                                    <input type="text" name="acuityvisualnearoi_cc" id="acuityvisualnearoi_cc" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualnearoi_cc']) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center flex-column">
                                            <label class="textMedicalHistoryLabel">PH</label>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="acuityvisualnearod_ph" id="acuityvisualnearod_ph" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualnearod_ph']) ?>">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="justify-content-between">
                                                    <input type="text" name="acuityvisualnearoi_ph" id="acuityvisualnearoi_ph" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualnearoi_ph']) ?>">
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
                                            <input type="text" name="keratometriahorizontal_od" id="keratometriahorizontal_od" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriahorizontal_od']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Vertical</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriavertical_od" id="keratometriavertical_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriavertical_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriaeje_od" id="keratometriaeje_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriaeje_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <label class="textMedicalHistoryLabel">Dif</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriadifferential_od" id="keratometriadifferential_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriadifferential_od']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="keratometriahorizontal_oi" id="keratometriahorizontal_oi" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriahorizontal_oi']) ?>">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriavertical_oi" id="keratometriavertical_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriavertical_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriaeje_oi" id="keratometriaeje_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriaeje_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="keratometriadifferential_oi" id="keratometriadifferential_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['keratometriadifferential_oi']) ?>">
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
                                            <input type="text" name="refractionsphere_od" id="refractionsphere_od" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionsphere_od']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractioncilindro_od" id="refractioncilindro_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractioncilindro_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractionaxis_od" id="refractionaxis_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionaxis_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Adici&oacute;n</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractionaddition_od" id="refractionaddition_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionaddition_od']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="refractionsphere_oi" id="refractionsphere_oi" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionsphere_oi']) ?>">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractioncilindro_oi" id="refractioncilindro_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractioncilindro_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractionaxis_oi" id="refractionaxis_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionaxis_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="refractionaddition_oi" id="refractionaddition_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['refractionaddition_oi']) ?>">
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
                                            <input type="text" name="subjectivesphere_od" id="subjectivesphere_od" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivesphere_od']) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Cilindro</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectivecylinder_od" id="subjectivecylinder_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivecylinder_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">Eje</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectiveeje_od" id="subjectiveeje_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectiveeje_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">ADD</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectiveadd_od" id="subjectiveadd_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectiveadd_od']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="textMedicalHistoryLabel">DP</label>
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectivedp_od" id="subjectivedp_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivedp_od']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-between mx-2 d-flex">
                                    <div class="textMedicalHistoryLabel d-flex align-items-center mx-1">OI</div>
                                    <input type="text" name="subjectivesphere_oi" id="subjectivesphere_oi" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivesphere_oi']) ?>">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectivecylinder_oi" id="subjectivecylinder_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivecylinder_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectiveeje_oi" id="subjectiveeje_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectiveeje_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectiveadd_oi" id="subjectiveadd_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectiveadd_oi']) ?>">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="justify-content-between mx-2">
                                        <input type="text" name="subjectivedp_oi" id="subjectivedp_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['subjectivedp_oi']) ?>">
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
                                            <input type="text" name="acuityvisualdistancefar_od" id="acuityvisualdistancefar_od" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualdistancefar_od']) ?>">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="textMedicalHistoryLabel">20/</div>
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="acuityvisualdistancefar_oi" id="acuityvisualdistancefar_oi" class="form-control mb-2 mx-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualdistancefar_oi']) ?>">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="textMedicalHistoryLabel">Cerca</label>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="acuityvisualdistancenear_od" id="acuityvisualdistancenear_od" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualdistancenear_od']) ?>">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="justify-content-between mx-2">
                                            <input type="text" name="acuityvisualdistancenear_oi" id="acuityvisualdistancenear_oi" class="form-control mb-2 inputMedicalHistory" value="<?php echo ($array_optometrist_history[0]['acuityvisualdistancenear_oi']) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    </div>
 

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Observaciones</label>
                        <textarea name="observation" id="observation" cols="10" rows="5" class="form-control inputMedicalHistory" value=""><?php echo ($array_optometrist_history[0]['observation']) ?></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Recomendaciones</label>
                        <textarea name="recommendation" id="recommendation" cols="10" rows="5" class="form-control inputMedicalHistory" value=""><?php echo ($array_optometrist_history[0]['recommendation']) ?></textarea>
                    </div>

                    <div class="justify-content-between mt-3 mb-3">
                        <label class="textMedicalHistoryLabel">Diagnostico</label>
                        <textarea name="diagnostic" id="diagnostic" cols="10" rows="5" class="form-control inputMedicalHistory" value=""><?php echo ($array_optometrist_history[0]['diagnostic']) ?></textarea>
                    </div>



                    <button type="button" class="align-items-center m-2 col-10 col-lg-4   mt-4 p-2 justify-content-center buttonSearch" onclick="HistoryClinicOptometrist.updateHistory()">
                        <i class="bi bi-floppy me-2 ms-2"></i> Guardar
                    </button>
                </form>
            </div>
        </div>
<?php }
}
?>