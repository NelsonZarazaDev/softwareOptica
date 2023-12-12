<?php
require_once "app/views/branchOfficesView.php";
require_once "app/models/branchOfficesModel.php";

class branchOfficesController
{
    function paginateBranchOffices()
    {
        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";

        $connection = new connection();

        $branchOfficesView = new branchOfficesView();
        $branchOfficesModel = new branchOfficesModel($connection);
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $array_sede_city = $branchOfficesModel->paginateSedeCity();
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_city[0]['name_department'] = '';
        $branchOfficesView->paginateBranchOffices($array_sede_city, $array_department, $array_city);
    }

    function insertCity()
    {
        $connection = new Connection();
        $branchOfficesModel = new branchOfficesModel($connection);
    
        $city = $_POST['id_city'];
        $departament = $_POST['id_departament'];
        $address = $_POST['address'];
        $state = true;
        $token_sede = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
    
        $DuplicateSede = $branchOfficesModel->duplicateSede($city, $departament, $address);
    
        if (empty($city) || empty($departament) || empty($address)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }
    
        if ($DuplicateSede) {
            $array_message = ['message' => 'La sucursal ya se encuentra en la base de datos'];
            exit(json_encode($array_message));
        }
    
        $branchOfficesModel->insertCity($city, $departament, $address, $state, $token_sede);
    }

    function modalCity()
    {
        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";
        $connection = new connection();
        $branchOfficesModel = new branchOfficesModel($connection);
        $branchOfficesView = new branchOfficesView();
        $departmentModel = new departmentModel($connection);
        $cityModel = new cityModel($connection);

        $token_sede = $_POST['token_sede'];

        $array_updateSede = $branchOfficesModel->updateSede($token_sede);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();


        $branchOfficesView->paginateModelSede($array_updateSede, $array_department, $array_city);
    }

    function updateCity()
    {
        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";
        $Connection = new Connection();

        $branchOfficesModel = new branchOfficesModel($Connection);
        $departmentModel = new departmentModel($Connection);
        $cityModel = new cityModel($Connection);

        $branchOfficesView = new branchOfficesView();

        $address = $_POST['address'];
        $status = $_POST['status'];
        $city = $_POST['name_city_sede'];
        $departament = $_POST['department_sede'];
        $token = $_POST['token'];
        $currentAddress = $_POST['currentAddress'];
        $currentState = $_POST['currentState'];

        if (empty($address) || empty($status)) {
            $array_message = ['message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        };

        if ($address == $currentAddress && $status == $currentState) {
            $array_message = ['message' => 'No se han realizado cambios'];
            exit(json_encode($array_message));
        }

        $DuplicateSede = $branchOfficesModel->duplicateSede($city, $departament, $address);
        if ($DuplicateSede) {
            $array_message = ['message' => 'La sucursal ya se encuentra en la base de datos'];
            exit(json_encode($array_message));
        }

        $array_sede_city = $branchOfficesModel->updateCity($address, $status, $token);
        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();

        $branchOfficesView->paginateBranchOffices($array_sede_city, $array_department, $array_city);
    }

    function searchCity()
    {

        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";
        require_once "app/models/searchCityModel.php";

        $connection = new connection();

        $branchOfficesView = new branchOfficesView();
        $branchOfficesModel = new branchOfficesModel($connection);
        $departmentModel = new departmentModel($connection);
        $searchCityModel = new searchCityModel($connection);
        $cityModel = new cityModel($connection);
        $department = $_POST['id_departament'];
        $array_city = $searchCityModel->searchCity($department);
        $array_sede_city = $branchOfficesModel->paginateSedeCity();
        $array_department = $departmentModel->paginateDepartment();
        $branchOfficesView->paginateBranchOffices($array_sede_city, $array_department, $array_city);
    }
}
