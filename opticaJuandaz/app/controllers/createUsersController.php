<?php
require_once "app/views/createUsersView.php";
require_once "app/models/createUsersModel.php";

class createUsersController
{  
    function paginateCreateUsers()
    {
        $conecction = new connection();
        $createUsersView = new createUsersView();
 
        $createUsersView->paginateCreateUsers();
    }

    function insertUser()
    {
        $conecction = new Connection();
        $createUsersModel = new createUsersModel($conecction);

        $id_role = $_POST['id_role'];
        $name_access = $_POST['name'];
        $surname_access = $_POST['surname'];
        $document_access = $_POST['document'];
        $date_birth_access = $_POST['birth_date'];
        $date_admission_access = $_POST['admission'];
        $phone_access = $_POST['phone'];
        $years_experience_access = $_POST['years_experience'];
        $email_access = $_POST['email'];
        $address_access = $_POST['address'];
        $sex_access = $_POST['sex'];
        $password_access = $_POST['password'];   
        $token_access=date('YmdHms').microtime(true).rand(1,1000).$_SESSION['id_access'].uniqid().rand(100,1000);
        $location_departament_id = $_POST['id_departament'];
        $location_city_id = $_POST['id_city']; 
        
         $createUsersModel->insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access,$token_access, $location_departament_id, $location_city_id);
        }
}
