<?php
require_once "app/views/createUsersView.php";
require_once "app/models/searchCityModel.php";

class searchCityController
{
    function searchCity()
    {
        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";
        require_once "app/models/roleModel.php";
        require_once "app/models/sedeCityModel.php";

        $connection = new connection();

        $departmentModel = new departmentModel($connection);
        $searchCityModel = new searchCityModel($connection);
        $roleModel = new roleModel($connection);
        $sedeCityModel = new sedeCityModel($connection);

        $department=$_POST['id_departament'];
        $array_city=$searchCityModel->searchCity($department);

        $createUsersView = new createUsersView();

        $array_department = $departmentModel->paginateDepartment();
        $array_role = $roleModel->paginateRole();
        $array_sede_city=$sedeCityModel->paginateSedeCity();
        $createUsersView->paginateCreateUsers($array_department, $array_city, $array_role,$array_sede_city);
    }
}
