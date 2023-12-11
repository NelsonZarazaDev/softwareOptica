<?php
require_once "app/models/loginModel.php";
require_once "app/views/loginView.php";

class loginController
{
    function validateUrl()
    {
        $loginView = new loginView();
        $loginView->showFormSession();
    }

    function validateFormSession($array)
    {
        $email = $array['email'];
        $password = $array['password'];

        $loginModel = new loginModel();

        $array_access = $loginModel->sqlFormSession($email, $password);
        if ($array_access) {
            $_SESSION['id_role'] = $array_access[0]['id_role'];
            $_SESSION['id_access'] = $array_access[0]['id_access'];
            $_SESSION['status_access'] = $array_access[0]['status_access'];
            $_SESSION['auth'] = 'OK';
            $_SESSION['document_access'] = $array_access[0]['document_access'];
            $_SESSION['cod_employee']=$array_access[0]['cod_employee'];
            $_SESSION['sede_city']=$array_access[0]['sede_city'];
        }
        header('Location: index.php');
    }

    function closeSession()
    {
        $array_response = array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $array_response['message'] = 'Sesión finalizada';

        exit(json_encode($array_response));
    }
}
