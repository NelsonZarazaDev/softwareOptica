<?php
require_once "app/models/searchMedicalHistoryModel.php";
require_once "app/views/searchMedicalHistoryView.php";

class searchMedicalHistoryController{
    function paginateSearchMedicalHistory()
    {

        $connection = new connection();

        $searchMedicalHistoryModel = new searchMedicalHistoryModel($connection);

        $searchMedicalHistoryView = new searchMedicalHistoryView();

        $array_searchMedicalHistory = $searchMedicalHistoryModel->paginateSearchMedicalHistory();
        $searchMedicalHistoryView->paginateSearchMedicalHistory($array_searchMedicalHistory);
    }

    function showMedicalHistory()
    {

        $connection = new connection();
        $roleModel = new roleModel($connection);
        $searchMedicalHistoryModel = new searchMedicalHistoryModel($connection);
        $searchMedicalHistoryView = new searchMedicalHistoryView();
        $token = $_POST['token_access'];

    }
}
?>