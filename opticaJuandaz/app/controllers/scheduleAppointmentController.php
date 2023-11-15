<?php
require_once "app/views/scheduleAppointmentView.php";
require_once "app/models/scheduleAppointmentModel.php";
class scheduleAppointmentController
{


    function paginateScheduleAppointment()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";

        $connection = new connection();

        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $scheduleAppointmentView = new scheduleAppointmentView();
        $cod_secretary = $_SESSION['cod_employee'];
        $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
    }

    function insertSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        $connection = new Connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $document = $_POST['document'];
        $phone = $_POST['phone'];
        $hour = $_POST['hour'];
        $date = $_POST['date'];
        $department = $_POST['id_department'];
        $city = $_POST['id_city'];
        $token = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        $cod_secretary = $_SESSION['id_access'];


        // Validar los campos
        if (empty($name) || empty($surname) || empty($document) || empty($phone) || empty($hour) || empty($date)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }

        // Validar que el teléfono contenga 10 números
        if (!preg_match('/^\d{10}$/', $phone)) {
            $array_message = ['message' => 'El teléfono debe contener exactamente 10 números'];
            exit(json_encode($array_message));
        }

        $arraySchedule = $scheduleAppointmentModel->duplicateSchedule($hour, $date);
        if ($arraySchedule) {
            $array_message = ['message' => 'Ya se a realizado una reserva a esa hora'];
            exit(json_encode($array_message));
        }

        $array_person=$scheduleAppointmentModel->duplicatePerson($document);
        
        if($array_person)
        {
            $id_person = $scheduleAppointmentModel->showId($document, $phone);
            $id_person = $id_person[0]['id_person'];
            $cod_secretary = $_SESSION['cod_employee'];
            $scheduleAppointmentModel->insertSchedule($id_person, $hour, $date, $cod_secretary, $token);
            $array_department = $departmentModel->paginateDepartment();
            $array_city = $cityModel->paginateCity();
            $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
            $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
        }
        else{
            $scheduleAppointmentModel->insertPerson($name, $surname, $document, $phone, $department, $city);
            $id_person = $scheduleAppointmentModel->showId($document, $phone);
            $id_person = $id_person[0]['id_person'];
            $cod_secretary = $_SESSION['cod_employee'];
            $scheduleAppointmentModel->insertSchedule($id_person, $hour, $date, $cod_secretary, $token);
            $array_department = $departmentModel->paginateDepartment();
            $array_city = $cityModel->paginateCity();
            $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
            $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
        }
    }

    function showSchedule()
    {
        $connection = new connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();

        $token = $_POST['token'];

        $array_schedule = $scheduleAppointmentModel->selectQuote(['field' => 'token', 'value' => $token]);
        $scheduleAppointmentView->showSchedule($array_schedule);
    }

    function updateSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        $connection = new connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $token = $_POST['token'];
        $id_person = $_POST['id_person'];
        $current_phone = $_POST['current_phone'];
        $phone_person_id = $_POST['phone_person'];
        $phone_person_name = $_POST['phone_person'];
        $hour_quote_id = $_POST['hour_quote'];
        $hour_quote_name = $_POST['hour_quote'];
        $date_quote_id = $_POST['date_quote'];
        $date_quote_name = $_POST['date_quote'];
        $current_date = $_POST['current_date'];
        $current_hour = $_POST['current_hour'];


        // Validar los campos
        if (empty($phone_person_id) || empty($hour_quote_id) || empty($date_quote_id)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }


        // Validar que el teléfono contenga 10 números
        if (!preg_match('/^\d{10}$/', $phone_person_id)) {
            $array_message = ['message' => 'El teléfono debe contener exactamente 10 números'];
            exit(json_encode($array_message));
        }

        if ($current_phone == $phone_person_id) {
            $arraySchedule = $scheduleAppointmentModel->duplicateSchedule($hour_quote_id, $date_quote_id);
            if ($arraySchedule) {
                $array_message = ['message' => 'Ya se a realizado una reserva a esa hora'];
                exit(json_encode($array_message));
            } else {
                $cod_secretary = $_SESSION['cod_employee'];
                $array_department = $departmentModel->paginateDepartment();
                $array_city = $cityModel->paginateCity();
                $scheduleAppointmentModel->updatePerson($id_person, $phone_person_id, $phone_person_name);
                $scheduleAppointmentModel->updateSchedule($token, $hour_quote_name, $hour_quote_id, $date_quote_name, $date_quote_id);
                $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
                $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
            }
        } else {
            $cod_secretary = $_SESSION['cod_employee'];
            $array_department = $departmentModel->paginateDepartment();
            $array_city = $cityModel->paginateCity();
            $scheduleAppointmentModel->updatePerson($id_person, $phone_person_id, $phone_person_name);
            $scheduleAppointmentModel->updateSchedule($token, $hour_quote_name, $hour_quote_id, $date_quote_name, $date_quote_id);
            $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
            $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
        }
    }

    function deleteSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        $connection = new connection();
        $departmentModel=new departmentModel($connection);
        $cityModel=new cityModel($connection);
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();

        $token = $_POST['token'];
        $array_department=$departmentModel->paginateDepartment();
            $array_city=$cityModel->paginateCity();
        $arraySchedule = $scheduleAppointmentModel->deleteSchedule($token);
        $scheduleAppointmentView->paginateScheduleAppointment($arraySchedule, $array_department, $array_city);
    }
}
