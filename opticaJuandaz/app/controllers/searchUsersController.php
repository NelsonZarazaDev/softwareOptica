<?php
require_once "app/views/searchUsersView.php";
require_once "app/models/searchUsersModel.php";

class searchUsersController
{
    function paginateSearchUsers()
    {
        $connection = new connection();
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();

        $array_searchUsers = $searchUsersModel->paginateSearchUsers();
        $searchUsersView->paginateSearchUsers($array_searchUsers);
    }

    function showSearchUsers()
    {
        $connection = new connection();
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();

        $token = $_POST['token_access'];

        $array_searchUsers = $searchUsersModel->selectUsers(['field' => 'token_access', 'value' => $token]);
        $searchUsersView->showSearchUsers($array_searchUsers);
    }

    function updateSearchUsers()
    {
        $connection = new connection();
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();

        $token_access = $_POST['token_access'];
        $id_role_id= $_POST['id_role'];
        $id_role_name= $_POST['id_role'];
        $phone_access_id = $_POST['phone_access'];
        $phone_access_name = $_POST['phone_access'];
        $email_access_id = $_POST['email_access'];
        $email_access_name = $_POST['email_access'];
        $address_access_id = $_POST['address_access'];
        $address_access_name = $_POST['address_access'];
        $status_access_id = $_POST['status_access'];
        $status_access_name = $_POST['status_access'];
        $password_access_id = $_POST['password_access'];
        $password_access_name = $_POST['password_access'];

        if(!filter_var($email_access_id, FILTER_VALIDATE_EMAIL)){
            exit('Correo Mal estructurado');
        }
        if(strlen($phone_access_id) < 10){
            exit('Numero telefonico invalido');
        }
        if(strlen($password_access_id)<8){
            exit('La contrasena debe tener 8 o mas caracteres');
        }

        if(empty($phone_access_id) || empty($email_access_id) || empty($address_access_id) || empty($password_access_id)){
            exit('Ningun campo debe estar vacio');
        }

        
        $searchUsersModel->updateSearchUsers($token_access,$id_role_id, $id_role_name, $phone_access_id, $phone_access_name, $email_access_id, $email_access_name, $address_access_id, $address_access_name, $status_access_id, $status_access_name, $password_access_id, $password_access_name);
        $array_updateSearchUsers = $searchUsersModel->paginateSearchUsers();
        $searchUsersView->paginateSearchUsers($array_updateSearchUsers);
    }

    function search(){
        $connection=new Connection();
        $searchUsersModel=new searchUsersModel($connection);
        $searchUsersView=new searchUsersView();
        $search=$_POST['search'];

        $array_search = $searchUsersModel->search($search);
        $searchUsersView->paginateSearchUsers($array_search);

    }
}