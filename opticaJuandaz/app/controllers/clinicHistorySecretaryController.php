<?php
require_once "app/views/clinicHistorySecretaryView.php";
require_once "app/models/clinicHistorySecretaryModel.php";

class clinicHistorySecretaryController
{ 
    function paginateClinicHistory()
    {
        $connection = new Connection();
        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d');
        $array_history = $clinicHistoryModel->paginateClinicHistory($date);
        $clinicHistoryView->paginateClinicHistory($array_history);
    }

    function modalHistoryClinic()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);

        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();
        $array_secretary_history = array(
            array(
                'id_person' => '',
                'name_person'  => '',
                'surname_person'  => '',
                'document_person'  => '',
                'healthcare_entity_person' => '',
                'occupation_person'  => '',
                'birth_date_person' => '',
                'age_person'  => '',
                'phone_person' => '',
                'location_department_id' => '',
                'location_city_id' => '',
                'address_person' => '',
                'token_person' => '',
                'id_medical_history' => '',
                'od_lensometry'  => '',
                'oi_lensometry' => '',
                'add_lensometry' => '',
                'farvisualacuityod_sc' => '',
                'farvisualacuityoi_sc' => '',
                'farvisualacuityod_cc' => '',
                'farvisualacuityoi_cc' => '',
                'farvisualacuityod_ph' => '',
                'farvisualacuityoi_ph' => '',
                'nearvisualacuity_a_od_sc' => '',
                'acuityvisualnearoi_sc' => '',
                'acuityvisualnearod_cc' => '',
                'acuityvisualnearoi_cc' => '',
                'acuityvisualnearod_ph' => '',
                'acuityvisualnearoi_ph' => '',
                'keratometriahorizontal_od' => '',
                'keratometriahorizontal_oi' => '',
                'keratometriavertical_od' => '',
                'keratometriavertical_oi' => '',
                'keratometriaeje_oi' => '',
                'keratometriadifferential_od' => '',
                'keratometriadifferential_oi' => '',
                'refractionsphere_od' => '',
                'refractionsphere_oi' => '',
                'refractioncilindro_od' => '',
                'refractionaxis_od' => '',
                'refractionaxis_oi' => '',
                'refractionaddition_od' => '',
                'refractionaddition_oi' => '',
                'subjectivesphere_od' => '',
                'subjectivesphere_oi' => '',
                'subjectivecylinder_od' => '',
                'subjectivecylinder_oi' => '',
                'subjectiveeje_od' => '',
                'subjectiveeje_oi' => '',
                'subjectiveadd_od' => '',
                'subjectiveadd_oi' => '',
                'subjectivedp_od' => '',
                'acuityvisualdistancefar_od' => '',
                'acuityvisualdistancefar_oi' => '',
                'acuityvisualdistancenear_od' => '',
                'acuityvisualdistancenear_oi' => '',
                'observation' => '',
                'recommendation' => '',
                'diagnostic' => '',
                'token_medical_history' => '',
                'cod_expert' => '',
                'date_history' => '',
                'hour_history' => '',
                'reason_history' => '',
                'personal_history' => '',
                'ocular_history' => '',
                'family_history' => '',
                'name_companion' => '',
                'surname_companion' => '',
                'phone_companion' => '',
                'relationship_companion' => '',
                'subjectivedp_oi' => '',
                'refractioncilindro_oi' => '',
                'keratometriaeje_od' => '',
                'keratometriaeje_od' => '',
                'name_department' => '',
                'name_city' => '',
                'cod_expert' => '',
                'name_access' => '',
                'surname_access' => '',
            )
        );
        $clinicHistoryView->modalHistoryClinic($array_secretary_history, $array_department, $array_city, $array_optometrist);
    }

    function searchDocument()
    {
        $connection = new connection();
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";

        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();

        $document = $_POST['documentHistory'];
        $documentSearch = $clinicHistoryModel->searchPerson($document);

        if ($documentSearch) {
            $array_secretary_history = $clinicHistoryModel->searchDocument($document);
            foreach ($array_secretary_history as &$item) {
                $item['name_companion'] = '';
                $item['surname_companion'] = '';
                $item['phone_companion'] = '';
                $item['relationship_companion'] = '';
            }
            $clinicHistoryView->modalHistoryClinic($array_secretary_history, $array_department, $array_city, $array_optometrist);
        } else {
            $array_secretary_history = array(
                array(
                    'id_person' => '',
                    'name_person'  => '',
                    'surname_person'  => '',
                    'document_person'  => $document,
                    'healthcare_entity_person' => '',
                    'occupation_person'  => '',
                    'birth_date_person' => '',
                    'age_person'  => '',
                    'phone_person' => '',
                    'location_department_id' => '',
                    'location_city_id' => '',
                    'address_person' => '',
                    'token_person' => '',
                    'id_medical_history' => '',
                    'od_lensometry'  => '',
                    'oi_lensometry' => '',
                    'add_lensometry' => '',
                    'farvisualacuityod_sc' => '',
                    'farvisualacuityoi_sc' => '',
                    'farvisualacuityod_cc' => '',
                    'farvisualacuityoi_cc' => '',
                    'farvisualacuityod_ph' => '',
                    'farvisualacuityoi_ph' => '',
                    'nearvisualacuity_a_od_sc' => '',
                    'acuityvisualnearoi_sc' => '',
                    'acuityvisualnearod_cc' => '',
                    'acuityvisualnearoi_cc' => '',
                    'acuityvisualnearod_ph' => '',
                    'acuityvisualnearoi_ph' => '',
                    'keratometriahorizontal_od' => '',
                    'keratometriahorizontal_oi' => '',
                    'keratometriavertical_od' => '',
                    'keratometriavertical_oi' => '',
                    'keratometriaeje_oi' => '',
                    'keratometriadifferential_od' => '',
                    'keratometriadifferential_oi' => '',
                    'refractionsphere_od' => '',
                    'refractionsphere_oi' => '',
                    'refractioncilindro_od' => '',
                    'refractionaxis_od' => '',
                    'refractionaxis_oi' => '',
                    'refractionaddition_od' => '',
                    'refractionaddition_oi' => '',
                    'subjectivesphere_od' => '',
                    'subjectivesphere_oi' => '',
                    'subjectivecylinder_od' => '',
                    'subjectivecylinder_oi' => '',
                    'subjectiveeje_od' => '',
                    'subjectiveeje_oi' => '',
                    'subjectiveadd_od' => '',
                    'subjectiveadd_oi' => '',
                    'subjectivedp_od' => '',
                    'acuityvisualdistancefar_od' => '',
                    'acuityvisualdistancefar_oi' => '',
                    'acuityvisualdistancenear_od' => '',
                    'acuityvisualdistancenear_oi' => '',
                    'observation' => '',
                    'recommendation' => '',
                    'diagnostic' => '',
                    'token_medical_history' => '',
                    'cod_expert' => '',
                    'date_history' => '',
                    'hour_history' => '',
                    'reason_history' => '',
                    'personal_history' => '',
                    'ocular_history' => '',
                    'family_history' => '',
                    'name_companion' => '',
                    'surname_companion' => '',
                    'phone_companion' => '',
                    'relationship_companion' => '',
                    'subjectivedp_oi' => '',
                    'refractioncilindro_oi' => '',
                    'keratometriaeje_od' => '',
                    'keratometriaeje_od' => '',
                    'name_department' => '',
                    'name_city' => '',
                    'cod_expert' => '',
                    'name_access' => '',
                    'surname_access' => '',
                )
            );
            $clinicHistoryView->modalHistoryClinic($array_secretary_history, $array_department, $array_city, $array_optometrist);
        }
    }

    function createHistory()
    {
        require_once "app/models/scheduleAppointmentModel.php";
        $connection = new connection();
        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        $id_Person = $_POST['idPersonHistory'];
        $document_person = $_POST['documentHistory'];
        $nameHistory = $_POST['nameHistory'];
        $surnameHistory = $_POST['surnameHistory'];
        $phoneHistory = $_POST['phoneHistory'];
        $id_department = $_POST['id_department'];
        $id_city = $_POST['id_city'];
        $id_optometrist = $_POST['id_optometrist'];
        $addressHistory = $_POST['addressHistory'];
        $birthDateHistory = $_POST['birthDateHistory'];
        $healthcareEntityHistory = $_POST['healthcareEntityHistory'];
        $ageHistory = $_POST['ageHistory'];
        $occupationHistory = $_POST['occupationHistory'];
        $relationshipHistory = $_POST['relationshipHistory'];
        $nameCompanionHistory = $_POST['nameCompanionHistory'];
        $surnameCompanionHistory = $_POST['surnameCompanionHistory'];
        $phoneCompanionHistory = $_POST['phoneCompanionHistory'];
        $reasonQueryHistory = $_POST['reasonQueryHistory'];
        $personalHistory = $_POST['personalHistory'];
        $OcularBackgroundHistory = $_POST['OcularBackgroundHistory'];
        $familyBackgroundHistory = $_POST['familyBackgroundHistory'];
        $tokenHistorySecretaryUpdate = $_POST['tokenHistorySecretary'];
        $tokenHistorySecretaryCreate = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        $token = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        date_default_timezone_set('America/Bogota');
        $dateCreation = date('Y-m-d');
        $hour = date('H:i:s');
        $documentSearch = $clinicHistoryModel->searchPerson($document_person);
        if ($documentSearch) {
            $clinicHistoryModel->updatePerson(
                $nameHistory,
                $surnameHistory,
                $phoneHistory,
                $addressHistory,
                $birthDateHistory,
                $healthcareEntityHistory,
                $ageHistory,
                $occupationHistory,
                $id_department,
                $id_city,
                $tokenHistorySecretaryUpdate
            );
            $clinicHistoryModel->createHistory($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $id_optometrist, $id_Person, $dateCreation, $hour, $token);
        } else {
            $clinicHistoryModel->createPerson(
                $document_person,
                $nameHistory,
                $surnameHistory,
                $phoneHistory,
                $id_department,
                $id_city,
                $addressHistory,
                $birthDateHistory,
                $healthcareEntityHistory,
                $ageHistory,
                $occupationHistory,
                $tokenHistorySecretaryCreate
            );
            $id_person = $scheduleAppointmentModel->showId($document_person);
            $id_personCreate = $id_person[0]['id_person'];
            $clinicHistoryModel->createHistory($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $id_optometrist, $id_personCreate, $dateCreation, $hour, $token);
        }
    }

    function showClinicHistory()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();
        $token = $_POST['token'];
        $array_history = $clinicHistoryModel->selectHistoryClinic(['field' => 'token_medical_history', 'value' => $token]);
        $clinicHistoryView->updateModalHistoryClinic($array_history, $array_department, $array_city, $array_optometrist);
    }

    function updateHistory()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $clinicHistoryModel = new clinicHistorySecretaryModel($connection);
        $clinicHistoryView = new clinicHistorySecretaryView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();

        $compareEntity = $_POST['compareEntity'];
        $compareOccupation = $_POST['compareOccupation'];
        $compareDepartment = $_POST['compareDepartment'];
        $compareCity = $_POST['compareCity'];
        $compareRelationship = $_POST['compareRelationship'];
        $compareNameCompanion = $_POST['compareNameCompanion'];
        $compareSurnameCompanion = $_POST['compareSurnameCompanion'];
        $comparePhoneCompanion = $_POST['comparePhoneCompanion'];
        $compareReason = $_POST['compareReason'];
        $comparePersonal = $_POST['comparePersonal'];
        $compareOcular = $_POST['compareOcular'];
        $compareFamily = $_POST['compareFamily'];


        $tokenHistory = $_POST['tokenHistory'];
        $tokenHistorySecretary = $_POST['tokenHistorySecretary'];
        $id_department = $_POST['id_department'];
        $id_city = $_POST['id_city'];
        $healthcareEntityHistory = $_POST['healthcareEntityHistory'];
        $occupationHistory = $_POST['occupationHistory'];
        $relationshipHistory = $_POST['relationshipHistory'];
        $nameCompanionHistory = $_POST['nameCompanionHistory'];
        $surnameCompanionHistory = $_POST['surnameCompanionHistory'];
        $phoneCompanionHistory = $_POST['phoneCompanionHistory'];
        $reasonQueryHistory = $_POST['reasonQueryHistory'];
        $personalHistory = $_POST['personalHistory'];
        $OcularBackgroundHistory = $_POST['OcularBackgroundHistory'];
        $familyBackgroundHistory = $_POST['familyBackgroundHistory'];

        if (
            $compareEntity == $healthcareEntityHistory && $compareOccupation == $occupationHistory && $compareDepartment == $id_department &&
            $compareCity == $id_city && $compareRelationship == $relationshipHistory  && $compareNameCompanion == $nameCompanionHistory  && $compareSurnameCompanion == $surnameCompanionHistory  && $comparePhoneCompanion == $phoneCompanionHistory && $compareReason == $reasonQueryHistory && $comparePersonal == $personalHistory && $compareOcular == $OcularBackgroundHistory && $compareFamily == $familyBackgroundHistory
        ) {
            $array_message=['message'=>'No se realizo cambios, datos sin modificar'];
            exit(json_encode($array_message));
        } else {
            $clinicHistoryModel->updatePersonHistory($id_department, $id_city, $healthcareEntityHistory, $occupationHistory, $tokenHistorySecretary);
            $clinicHistoryModel->updateHistoryUpdate($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $tokenHistory);
            $array_history = $clinicHistoryModel->selectHistoryClinic(['field' => 'token_medical_history', 'value' => $tokenHistory]);
            $clinicHistoryView->updateModalHistoryClinic($array_history, $array_department, $array_city, $array_optometrist);
        }
    }

    
}
