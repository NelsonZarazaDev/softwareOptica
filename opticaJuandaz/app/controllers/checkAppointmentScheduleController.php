<?php
require_once "app/views/checkAppointmentScheduleView.php";
require_once "app/models/checkAppointmentScheduleModel.php";
class checkAppointmentScheduleController
{ 

    function paginateCheckAppointmentSchedule()
    {
        $connection = new connection();
        $checkAppointmentScheduleModel = new checkAppointmentScheduleModel($connection);
        $checkAppointmentScheduleView = new checkAppointmentScheduleView();
        $cod_secretary = $_SESSION['cod_employee'];
        $arraySchedule = $checkAppointmentScheduleModel->paginateCheckAppointmentSchedule($cod_secretary);
        $checkAppointmentScheduleView->paginateCheckAppointmentSchedule($arraySchedule);
    }


    function showCheckAppointmentSchedule()
    {
        $connection = new connection();
        $checkAppointmentScheduleModel = new checkAppointmentScheduleModel($connection);
        $checkAppointmentScheduleView = new checkAppointmentScheduleView();

        $token = $_POST['token'];
        $array_schedule = $checkAppointmentScheduleModel->selectQuote(['field' => 'token', 'value' => $token]);
        $checkAppointmentScheduleView->showCheckAppointmentSchedule($array_schedule);
    }
}
