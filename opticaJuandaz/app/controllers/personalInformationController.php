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
        $token= $_SESSION['token_access'];
        $array_info=$personalInformationModel->info($token);
        $personalInformationView->paginatePersonalInformation($array_info);
    }
}
