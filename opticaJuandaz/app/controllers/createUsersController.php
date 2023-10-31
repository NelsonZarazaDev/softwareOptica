<?php
require_once "app/views/createUsersView.php";
require_once "app/models/createUsersModel.php";

class createUsersController
{  
    function paginateCreateUsers()
    {
        $conecction = new connection();
        $createUsersModel = new createUsersModel($conecction);
        $createUsersView = new createUsersView();

        $createUsersView->paginateCreateUsers();
    }

    function insertUser()
    {
        $conecction = new Connection();
        $createUsersModel = new createUsersModel($conecction);
        $createUsersView = new createUsersView();

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
        $location_country_id = $_POST['id_country'];
        $location_departament_id = $_POST['id_departament'];
        $location_city_id = $_POST['id_city']; 

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo_person"])) {
            $targetDirectory = "public/img/";
            $imageFileType = strtolower(pathinfo($_FILES["photo_person"]["name"], PATHINFO_EXTENSION));
            $allowedExtensions = array('jpg');
            if (!in_array($imageFileType, $allowedExtensions)) {
                echo "Lo siento, solo se permiten archivos JPG.";
                return;
            }
            $targetFile = $targetDirectory . $name_access . "." . $imageFileType;
            if ($_FILES["photo_person"]["size"] > 1000000) {
                echo "Lo siento, el archivo es muy grande.";
            }
            elseif (move_uploaded_file($_FILES["photo_person"]["tmp_name"], $targetFile)) {
                echo "La imagen ha sido guardada correctamente.";
            } else {
                echo "Hubo un error al guardar la imagen.";
            }

        }

        if (empty($name_access) || empty($surname_access) || empty($document_access) || empty($date_birth_access) || empty($date_admission_access) || empty($phone_access) || empty($years_experience_access) || empty($email_access) || empty($address_access) || empty($sex_access) || empty($password_access)) {
            echo "Por favor, complete todos los campos obligatorios.";
            return;
        }


        if (!filter_var($email_access, FILTER_VALIDATE_EMAIL)) {
            echo "La dirección de correo electrónico no es válida.";
            return;
        }

        if (!strtotime($date_birth_access)) {
            echo "La fecha de nacimiento no es válida.";
            return;
        }

        if (!strtotime($date_admission_access)) {
            echo "La fecha de admisión no es válida.";
            return;
        }

        if (!preg_match('/^\d{10}$/', $phone_access)) {
            echo "El número de teléfono no es válido.";
            return;
        }


        if (!ctype_digit($years_experience_access) || $years_experience_access < 0) {
            echo "El número de años de experiencia no es válido.";
            return;
        }

        if ($sex_access !== 'M' && $sex_access !== 'F') {
            echo "El género no es válido.";
            return;
        }


        if (strlen($password_access) < 8 || !preg_match('/\d/', $password_access) || !preg_match('/[a-zA-Z]/', $password_access)) {
            echo "La contraseña no cumple con los requisitos mínimos de seguridad.";
            return;
        }        
        
         $createUsersModel->insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access,$token_access, $location_country_id, $location_departament_id, $location_city_id);
    }
}
