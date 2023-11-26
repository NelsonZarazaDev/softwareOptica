<?php
require_once "app/views/personalInformationView.php";
require_once "app/models/personalInformationModel.php";

class personalInformationController
{
    function paginatePersonalInformation()
    {
        $connection = new Connection();
        $personalInformationModel=new personalInformationModel($connection);
        $personalInformationView = new personalInformationView();
        $codEmployee= $_SESSION['cod_employee'];
        $array_info=$personalInformationModel->info($codEmployee);
        $personalInformationView->paginatePersonalInformation($array_info);
    }
}
