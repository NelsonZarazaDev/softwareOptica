<?php
require_once "app/views/branchOfficesView.php";
require_once "app/models/branchOfficesModel.php";

class branchOfficesController
{
    function paginateBranchOffices()
    {
        require_once "app/models/sedeCityModel.php";

        $connection = new connection();

        $branchOfficesView = new branchOfficesView();
        $branchOfficesModel = new branchOfficesModel($connection);

        $array_sede_city = $branchOfficesModel->paginateSedeCity();

        $branchOfficesView->paginateBranchOffices($array_sede_city);
    }

    function insertCity()
    {
        $connection = new Connection();
        $branchOfficesModel = new branchOfficesModel($connection);

        $city = $_POST['city'];
        $address = $_POST['address'];
        $state = true;

        $token_sede = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);

        if (empty($city) || empty($address)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }

        $branchOfficesModel->insertCity($city, $address, $state, $token_sede);
    }

    function modalCity()
    {
        $connection = new connection();
        $branchOfficesModel = new branchOfficesModel($connection);
        $branchOfficesView = new branchOfficesView();

        $token_sede = $_POST['token_sede'];

        $array_updateSede = $branchOfficesModel->updateSede($token_sede);
        $branchOfficesView->paginateModelSede($array_updateSede);
    }

    function updateCity()
    {
        $Connection = new Connection('all');

        $branchOfficesModel = new branchOfficesModel($Connection);

        $branchOfficesView = new branchOfficesView();

        $city = $_POST['city'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $token = $_POST['token'];
        $currentName = $_POST['currentName'];
        $currentAddress = $_POST['currentAddress'];
        $currentState = $_POST['currentState'];

        if (empty($city) || empty($address) || empty($status)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        };

        if ($city == $currentName && $address == $currentAddress && $status == $currentState) {
            $array_message = ['message' => 'No se han realizado cambios'];
            exit(json_encode($array_message));
        }        

        $array_sede_city = $branchOfficesModel->updateCity($city, $address, $status, $token);

        $branchOfficesView->paginateBranchOffices($array_sede_city);
    }
}
