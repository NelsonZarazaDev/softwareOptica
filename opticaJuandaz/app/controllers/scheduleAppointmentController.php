<?php
require_once "app/views/scheduleAppointmentView.php";
require_once "app/models/scheduleAppointmentModel.php";
class scheduleAppointmentController
{


    function paginateScheduleAppointment()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";

        $connection = new connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $cod_secretary = $_SESSION['cod_employee'];
        $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();
        $person_data = array(
            array(
                'document_person' => '',
                'name_person'  => '',
                'surname_person'  => '',
                'phone_person'  => '',
                'location_department_id' => '',
                'name_department' => '',
                'location_city_id'  => '',
                'name_city' => '',
                'name_access'  => '',
                'surname_access'  => '',
                'cod_expert' => '',
            )
        );
        $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
    }

    function insertSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new Connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);


        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $document = $_POST['document'];
        $phone = $_POST['phone'];
        $hour = $_POST['hour'];
        $date = $_POST['date'];
        $department = $_POST['id_department'];
        $city = $_POST['id_city'];
        $id_optometrist = $_POST['id_optometrist'];
        $sede_city = $_SESSION['sede_city'];
        date_default_timezone_set('America/Bogota');
        $dateCreationQuote = date('Y-m-d');
        $token = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        $tokenPerson = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        $cod_secretary = $_SESSION['cod_employee'];

        // Validar los campos
        if (empty($name) || empty($surname) || empty($document) || empty($phone) || empty($hour) || empty($date) || empty($id_optometrist) || empty($city) || empty($department)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }

        // Validar que el teléfono contenga 10 números
        if (!preg_match('/^\d{10}$/', $phone)) {
            $array_message = ['message' => 'El teléfono debe contener exactamente 10 números'];
            exit(json_encode($array_message));
        }

        $arraySchedule = $scheduleAppointmentModel->duplicateSchedule($hour, $date, $cod_secretary);
        if ($arraySchedule) {
            $array_message = ['message' => 'Ya se a realizado una reserva a esa hora'];
            exit(json_encode($array_message));
        }

        $array_person = $scheduleAppointmentModel->duplicatePerson($document);

        if ($array_person) {
            $id_person = $scheduleAppointmentModel->showId($document);
            $id_person = $id_person[0]['id_person'];
            $scheduleAppointmentModel->insertSchedule($id_person, $hour, $date, $cod_secretary, $token, $id_optometrist, $dateCreationQuote, $sede_city);
            $array_department = $departmentModel->paginateDepartment();
            $array_city = $cityModel->paginateCity();
            $array_optometrist = $optometristModel->paginateOptometrist();
            $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
            $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
        } else {
            $scheduleAppointmentModel->insertPerson($name, $surname, $document, $phone, $department, $city, $tokenPerson);
            $id_person = $scheduleAppointmentModel->showId($document);
            $id_person = $id_person[0]['id_person'];
            $scheduleAppointmentModel->insertSchedule($id_person, $hour, $date, $cod_secretary, $token, $id_optometrist, $dateCreationQuote, $sede_city);
            $array_department = $departmentModel->paginateDepartment();
            $array_city = $cityModel->paginateCity();
            $array_optometrist = $optometristModel->paginateOptometrist();
            $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
            $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
        }
    }

    function showSchedule()
    {
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $optometristModel = new optometristModel($connection);

        $scheduleAppointmentView = new scheduleAppointmentView();


        $token = $_POST['token'];
        $array_optometrist = $optometristModel->paginateOptometrist();
        $array_schedule = $scheduleAppointmentModel->selectQuote(['field' => 'token', 'value' => $token]);
        $scheduleAppointmentView->showSchedule($array_schedule, $array_optometrist);
    }

    function updateSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);

        $token = $_POST['current_token'];
        $id_person = $_POST['current_id_person'];
        $current_phone = $_POST['current_phone'];
        $phone_person_id = $_POST['phone_person'];
        $phone_person_name = $_POST['phone_person'];
        $hour_quote_id = $_POST['hour_quote'];
        $hour_quote_name = $_POST['hour_quote'];
        $date_quote_id = $_POST['date_quote'];
        $date_quote_name = $_POST['date_quote'];
        $current_cod_expert = $_POST['current_cod_expert'];
        $cod_expert_id = $_POST['id_optometrist'];
        $cod_expert_name = $_POST['id_optometrist'];
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
        if ($current_phone == $phone_person_id and $current_date == $date_quote_id and $current_hour == $hour_quote_id and $current_cod_expert == $cod_expert_id) {
            $array_message = ['message' => 'No se han realizado cambios en la reserva'];
            exit(json_encode($array_message));
        } else {
            if ($date_quote_id != $current_date && $hour_quote_id != $current_hour) {
                $cod_secretary = $_SESSION['cod_employee'];
                $arraySchedule = $scheduleAppointmentModel->duplicateSchedule($hour_quote_id, $date_quote_id, $cod_secretary);
            }
            if ($arraySchedule) {
                $array_message = ['message' => 'Ya se a realizado una reserva a esa hora'];
                exit(json_encode($array_message));
            } else {
                $person_data = array(
                    array(
                        'document_person' => '',
                        'name_person'  => '',
                        'surname_person'  => '',
                        'phone_person'  => '',
                        'location_department_id' => '',
                        'name_department' => '',
                        'location_city_id'  => '',
                        'name_city' => '',
                        'name_access'  => '',
                        'surname_access'  => '',
                        'cod_expert' => '',
                    )
                );
                $cod_secretary = $_SESSION['cod_employee'];
                $array_department = $departmentModel->paginateDepartment();
                $array_city = $cityModel->paginateCity();
                $array_optometrist = $optometristModel->paginateOptometrist();
                $scheduleAppointmentModel->updatePerson($id_person, $phone_person_id, $phone_person_name);
                $scheduleAppointmentModel->updateSchedule($token, $hour_quote_name, $hour_quote_id, $date_quote_name, $date_quote_id, $cod_expert_name, $cod_expert_id);
                $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
                $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
            }
        }
    }

    function deleteSchedule()
    {
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $connection = new connection();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $token = $_POST['current_token'];
        $date = $_POST['current_date'];
        $person_data = array(
            array(
                'document_person' => '',
                'name_person'  => '',
                'surname_person'  => '',
                'phone_person'  => '',
                'location_department_id' => '',
                'name_department' => '',
                'location_city_id'  => '',
                'name_city' => '',
                'name_access'  => '',
                'surname_access'  => '',
                'cod_expert' => '',
            )
        );
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();
        $arraySchedule = $scheduleAppointmentModel->deleteSchedule($token);
        $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
    }

    function searchDocument()
    {
        $connection = new connection();
        require_once "app/models/cityModel.php";
        require_once "app/models/departmentModel.php";
        require_once "app/models/optometristModel.php";
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $scheduleAppointmentModel = new scheduleAppointmentModel($connection);
        $scheduleAppointmentView = new scheduleAppointmentView();
        $cityModel = new cityModel($connection);
        $optometristModel = new optometristModel($connection);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_optometrist = $optometristModel->paginateOptometrist();
        $document = $_POST['document'];
        $cod_secretary = $_SESSION['cod_employee'];
        $arraySchedule = $scheduleAppointmentModel->paginateScheduleAppointment($cod_secretary);
        $documentSearch = $scheduleAppointmentModel->searchPerson($document);
        if ($documentSearch) {
            $person_data = $scheduleAppointmentModel->searchDocument($document);
            $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
        } else {
            $person_data = array(
                array(
                    'document_person' => $document,
                    'name_person'  => '',
                    'surname_person'  => '',
                    'phone_person'  => '',
                    'location_department_id' => '',
                    'name_department' => '',
                    'location_city_id'  => '',
                    'name_city' => '',
                    'name_access'  => '',
                    'surname_access'  => '',
                    'cod_expert' => '',
                )
            );
            $scheduleAppointmentView->paginateScheduleAppointment($person_data, $arraySchedule, $array_department, $array_city, $array_optometrist);
        }
    }
}
