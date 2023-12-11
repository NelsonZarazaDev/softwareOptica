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
        require_once "app/models/roleModel.php";
        require_once "app/models/sedeCityModel.php";

        $connection = new connection();
        $roleModel = new roleModel($connection);
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();
        $sedeCityModel = new sedeCityModel($connection);
        $array_role = $roleModel->paginateRole();
        $array_sede_city=$sedeCityModel->paginateSedeCity();
        $token = $_POST['token_access'];

        $array_searchUsers = $searchUsersModel->selectUsers(['field' => 'token_access', 'value' => $token]);
        $searchUsersView->showSearchUsers($array_searchUsers, $array_role, $array_sede_city);
    }

    function updateSearchUsers()
    {
        $connection = new connection();
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();

        $token_access = $_POST['token_access'];
        $id_role_id = $_POST['id_role'];
        $id_role_name = $_POST['id_role'];
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
        $sede_city=$_POST['id_sede_city'];

        $arrayDuplicateSearch = $searchUsersModel->duplicateSearch($id_role_id, $id_role_name, $phone_access_id, $phone_access_name, $email_access_id, $email_access_name, $address_access_id, $address_access_name, $status_access_id, $status_access_name, $password_access_id, $password_access_name, $token_access, $sede_city);

        if (empty($id_role_id) || empty($phone_access_id) || empty($email_access_id) || empty($address_access_id) || empty($status_access_id) || empty($password_access_id) || empty($sede_city)) {
            $array_message = ['error' => true, 'message' => 'Todos los campos son obligatorios.'];
            exit(json_encode($array_message));
        }

        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*+#?&])[A-Za-z\d@$!%*+#?&]{8,}$/', $password_access_id)) {
            $array_message = ['error' => true, 'message' => 'La contraseña debe tener al menos 8 caracteres, incluir letras, números y caracteres especiales (@$!%*+#?&)'];
            exit(json_encode($array_message));
        }

        if (!preg_match('/^\d{10}$/', $phone_access_id)) {
            $array_message = ['error' => true, 'message' => 'El teléfono debe contener 10 números'];
            exit(json_encode($array_message));
        }

        if (!filter_var($email_access_id, FILTER_VALIDATE_EMAIL)) {
            $array_message = ['error' => true, 'message' => 'Ingrese un correo electrónico válido'];
            exit(json_encode($array_message));
        }


        if ($arrayDuplicateSearch) {
            $array_message = ['message' => 'No se a realizado cambios'];
            exit(json_encode($array_message));
        }
        $searchUsersModel->updateSearchUsers($token_access, $id_role_id, $id_role_name, $phone_access_id, $phone_access_name, $email_access_id, $email_access_name, $address_access_id, $address_access_name, $status_access_id, $status_access_name, $password_access_id, $password_access_name, $sede_city);
        $array_updateSearchUsers = $searchUsersModel->paginateSearchUsers();
        $searchUsersView->paginateSearchUsers($array_updateSearchUsers);
    }

    function search()
    {
        $connection = new Connection();
        $searchUsersModel = new searchUsersModel($connection);
        $searchUsersView = new searchUsersView();
        $search = $_POST['search'];
        if (empty($search)) {
            $array_message = ['error' => true, 'message' => 'Campo vacio'];
            exit(json_encode($array_message));
        } else {
            $array_search = $searchUsersModel->search($search);
            $searchUsersView->paginateSearchUsers($array_search);
        }
    }
}
