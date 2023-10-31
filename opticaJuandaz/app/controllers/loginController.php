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
            $_SESSION['name_access'] = $array_access[0]['name_access'];
            $_SESSION['token_access']=$array_access[0]['token_access'];
        }
/*         header('Location: index.php'); */
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
