<?php
require_once "app/views/clinicHistoryView.php";
    
class clinicHistoryController
{ 
    function paginateClinicHistory()
    {
        $clinicHistory=new clinicHistory();
        $clinicHistory->paginateClinicHistory();  
    }

    function createUser(){}
}
?>