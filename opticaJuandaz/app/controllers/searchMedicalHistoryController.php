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

    function viewClinicHistory(){
        $connection = new connection();
        $searchMedicalHistoryModel = new searchMedicalHistoryModel($connection);
        $searchMedicalHistoryView = new searchMedicalHistoryView();
        $token=$_POST['token'];
        $array_search_history=$searchMedicalHistoryModel->viewClinicHistory(['field'=>'token_medical_history','value'=>$token]);
        $searchMedicalHistoryView->viewClinicHistory($array_search_history);
    }

    function search(){
        $connection = new Connection();
        $searchMedicalHistoryModel = new searchMedicalHistoryModel($connection);
        $searchMedicalHistoryView = new searchMedicalHistoryView();
        $search = $_POST['search'];
        if (empty($search)) {
            $array_message = ['error' => true, 'message' => 'Campo vacio'];
            exit(json_encode($array_message));
        } else {
        $array_search = $searchMedicalHistoryModel->search($search);
        $searchMedicalHistoryView->paginateSearchMedicalHistory($array_search);
        }
    }
}
?>