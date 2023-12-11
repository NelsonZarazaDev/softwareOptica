<?php
require_once "app/views/clinicHistoryOptometristView.php";
require_once "app/models/clinicHistoryOptometristModel.php";

class clinicHistoryOptometristController
{
    function paginateClinicHistory()
    {
        $connection = new Connection();
        $clinicHistoryModel = new clinicHistoryOptometristModel($connection);
        $clinicHistoryView = new clinicHistoryOptometristView();
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d');
        $cod_optometry = $_SESSION['cod_employee'];
        $array_history = $clinicHistoryModel->paginateClinicHistory($date, $cod_optometry);
        $clinicHistoryView->paginateClinicHistory($array_history);
    }


    function updateTokenClinicHistory()
    {
        $connection = new connection();
        $clinicHistoryModel = new clinicHistoryOptometristModel($connection);
        $clinicHistoryView = new clinicHistoryOptometristView();
        $token = $_POST['token'];
        $array_history = $clinicHistoryModel->selectHistoryClinic(['field' => 'token_medical_history', 'value' => $token]);
        $clinicHistoryView->modalHistoryClinic($array_history);
    }

    function updateHistory()
    {
        require_once "app/models/scheduleAppointmentModel.php";
        $connection = new connection();
        $clinicHistoryModel = new clinicHistoryOptometristModel($connection);
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $clinicHistoryView = new clinicHistoryOptometristView();

        $reason_history = $_POST['reason_history'];
        $personal_history = $_POST['personal_history'];
        $ocular_history = $_POST['ocular_history'];
        $family_history = $_POST['family_history'];


        $od_lensometry = $_POST['od_lensometry'];
        $oi_lensometry = $_POST['oi_lensometry'];


        $farvisualacuityod_sc = $_POST['farvisualacuityod_sc'];
        $farvisualacuityoi_sc = $_POST['farvisualacuityoi_sc'];
        $farvisualacuityod_cc = $_POST['farvisualacuityod_cc'];
        $farvisualacuityoi_cc = $_POST['farvisualacuityoi_cc'];
        $farvisualacuityod_ph = $_POST['farvisualacuityod_ph'];
        $farvisualacuityoi_ph = $_POST['farvisualacuityoi_ph'];

        $nearvisualacuity_a_od_sc = $_POST['nearvisualacuity_a_od_sc'];
        $acuityvisualnearoi_sc = $_POST['acuityvisualnearoi_sc'];
        $acuityvisualnearod_cc = $_POST['acuityvisualnearod_cc'];
        $acuityvisualnearoi_cc = $_POST['acuityvisualnearoi_cc'];
        $acuityvisualnearod_ph = $_POST['acuityvisualnearod_ph'];
        $acuityvisualnearoi_ph = $_POST['acuityvisualnearoi_ph'];


        $keratometriahorizontal_od = $_POST['keratometriahorizontal_od'];
        $keratometriahorizontal_oi = $_POST['keratometriahorizontal_oi'];
        $keratometriavertical_od = $_POST['keratometriavertical_od'];
        $keratometriavertical_oi = $_POST['keratometriavertical_oi'];
        $keratometriaeje_od = $_POST['keratometriaeje_od'];
        $keratometriaeje_oi = $_POST['keratometriaeje_oi'];


        $refractionsphere_od = $_POST['refractionsphere_od'];
        $refractionsphere_oi = $_POST['refractionsphere_oi'];
        $refractioncilindro_od = $_POST['refractioncilindro_od'];
        $refractioncilindro_oi = $_POST['refractioncilindro_oi'];
        $refractionaxis_od = $_POST['refractionaxis_od'];
        $refractionaxis_oi = $_POST['refractionaxis_oi'];



        $subjectivesphere_od = $_POST['subjectivesphere_od'];
        $subjectivesphere_oi = $_POST['subjectivesphere_oi'];
        $subjectivecylinder_od = $_POST['subjectivecylinder_od'];
        $subjectivecylinder_oi = $_POST['subjectivecylinder_oi'];
        $subjectiveeje_od = $_POST['subjectiveeje_od'];
        $subjectiveeje_oi = $_POST['subjectiveeje_oi'];
        $subjectivedp_od = $_POST['subjectivedp_od'];
        $subjectivedp_oi = $_POST['subjectivedp_oi'];

        $acuityvisualdistancefar_od = $_POST['acuityvisualdistancefar_od'];
        $acuityvisualdistancefar_oi = $_POST['acuityvisualdistancefar_oi'];
        $acuityvisualdistancenear_od = $_POST['acuityvisualdistancenear_od'];
        $acuityvisualdistancenear_oi = $_POST['acuityvisualdistancenear_oi'];


        $observation = $_POST['observation'];
        $recommendation = $_POST['recommendation'];
        $diagnostic = $_POST['diagnostic'];


        $token = $_POST['token_medical_history'];

        if(empty($reason_history) ||
        empty($personal_history) ||
        empty($ocular_history) ||
        empty($family_history) ||
        empty($od_lensometry) ||
        empty($oi_lensometry) ||
        empty($farvisualacuityod_sc) ||
        empty($farvisualacuityoi_sc) ||
        empty($farvisualacuityod_cc) ||
        empty($farvisualacuityoi_cc) ||
        empty($farvisualacuityod_ph) ||
        empty($farvisualacuityoi_ph) ||
        empty($nearvisualacuity_a_od_sc) ||
        empty($acuityvisualnearoi_sc) ||
        empty($acuityvisualnearod_cc) ||
        empty($acuityvisualnearoi_cc) ||
        empty($acuityvisualnearod_ph) ||
        empty($acuityvisualnearoi_ph) ||
        empty($keratometriahorizontal_od) ||
        empty($keratometriahorizontal_oi) ||
        empty($keratometriavertical_od) ||
        empty($keratometriavertical_oi) ||
        empty($keratometriaeje_od) ||
        empty($keratometriaeje_oi) ||
        empty($refractionsphere_od) ||
        empty($refractionsphere_oi) ||
        empty($refractioncilindro_od) ||
        empty($refractioncilindro_oi) ||
        
        empty($refractionaxis_od) ||
        empty($refractionaxis_oi) ||
        empty($subjectivesphere_od) ||
        empty($subjectivesphere_oi) ||
        empty($subjectivecylinder_od) ||
        empty($subjectivecylinder_oi) ||
        empty($subjectiveeje_od) ||
        empty($subjectiveeje_oi) ||
        empty($subjectivedp_od) ||
        empty($subjectivedp_oi) ||
        empty($acuityvisualdistancefar_od) ||
        empty($acuityvisualdistancefar_oi) ||
        empty($acuityvisualdistancenear_od) ||
        empty($acuityvisualdistancenear_oi) ||
        empty($observation) ||
        empty($recommendation) ||
        empty($diagnostic)        
        ){
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }

        $array_update = $clinicHistoryModel->updateHistory(
            $reason_history,
            $personal_history,
            $ocular_history,
            $family_history,
            $od_lensometry,
            $oi_lensometry,
            $farvisualacuityod_sc,
            $farvisualacuityoi_sc,
            $farvisualacuityod_cc,
            $farvisualacuityoi_cc,
            $farvisualacuityod_ph,
            $farvisualacuityoi_ph,
            $nearvisualacuity_a_od_sc,
            $acuityvisualnearoi_sc,
            $acuityvisualnearod_cc,
            $acuityvisualnearoi_cc,
            $acuityvisualnearod_ph,
            $acuityvisualnearoi_ph,
            $keratometriahorizontal_od,
            $keratometriahorizontal_oi,
            $keratometriavertical_od,
            $keratometriavertical_oi,
            $keratometriaeje_od,
            $keratometriaeje_oi,
            $refractionsphere_od,
            $refractionsphere_oi,
            $refractioncilindro_od,
            $refractioncilindro_oi,
            $refractionaxis_od,
            $refractionaxis_oi,
            $subjectivesphere_od,
            $subjectivesphere_oi,
            $subjectivecylinder_od,
            $subjectivecylinder_oi,
            $subjectiveeje_od,
            $subjectiveeje_oi,
            $subjectivedp_od,
            $subjectivedp_oi,
            $acuityvisualdistancefar_od,
            $acuityvisualdistancefar_oi,
            $acuityvisualdistancenear_od,
            $acuityvisualdistancenear_oi,
            $observation,
            $recommendation,
            $diagnostic,
            $token
        );
        date_default_timezone_set('America/Bogota');
        $date = date('Y-m-d');
        $cod_optometry = $_SESSION['cod_employee'];
        $array_history = $clinicHistoryModel->paginateClinicHistory($date, $cod_optometry);
        $clinicHistoryView->paginateClinicHistory($array_history);
    }
}
