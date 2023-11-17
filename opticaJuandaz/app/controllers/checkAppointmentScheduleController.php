<?php
require_once "app/views/checkAppointmentScheduleView.php";
require_once "app/models/checkAppointmentScheduleModel.php";
class checkAppointmentScheduleController
{

    function paginateCheckAppointmentSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";

        $connection = new connection();

        $checkAppointmentScheduleModel = new checkAppointmentScheduleModel($connection);
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $checkAppointmentScheduleView = new checkAppointmentScheduleView();
        $cod_secretary = $_SESSION['cod_employee'];
        $arraySchedule = $checkAppointmentScheduleModel->paginateCheckAppointmentSchedule($cod_secretary);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $checkAppointmentScheduleView->paginateCheckAppointmentSchedule($arraySchedule, $array_department, $array_city);
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
