<?php
require_once "app/models/searchMedicalHistoryModel.php";
require_once "app/views/searchMedicalHistoryView.php";

class searchMedicalHistoryController{
    function paginateSearchMedicalHistory(){
        $connection=new Connection();

        $searchMedicalHistoryModel=new searchMedicalHistoryModel($connection);
        $searchMedicalHistoryView=new searchMedicalHistoryView();
        $searchMedicalHistoryView->paginateSearchMedicalHistory();
    }
}
?>