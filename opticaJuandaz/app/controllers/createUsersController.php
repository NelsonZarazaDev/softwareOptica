<?php
require_once "app/views/createUsersView.php";
require_once "app/models/createUsersModel.php";

class createUsersController
{
    function paginateCreateUsers()
    {
        require_once "app/models/departmentModel.php";
        require_once "app/models/cityModel.php";
        require_once "app/models/roleModel.php";

        $conecction = new connection();

        $departmentModel = new departmentModel($conecction);
        $cityModel = new cityModel($conecction);
        $roleModel = new roleModel($conecction);

        $createUsersView = new createUsersView();

        $array_department = $departmentModel->paginateDepartment();
        $array_city = $cityModel->paginateCity();
        $array_role = $roleModel->paginateRole();
        $createUsersView->paginateCreateUsers($array_department, $array_city, $array_role);
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
        $token_access = date('YmdHms') . microtime(true) . rand(1, 1000) . $_SESSION['id_access'] . uniqid() . rand(100, 1000);
        $location_departament_id = $_POST['id_departament'];
        $location_city_id = $_POST['id_city'];

        $array_create = $createUsersModel->diplicateCreate($email_access, $document_access);

        if (
            empty($name_access) || empty($surname_access) || empty($document_access) ||
            empty($date_birth_access) || empty($date_admission_access) || empty($phone_access) ||
            empty($years_experience_access) || empty($email_access) || empty($address_access) ||
            empty($sex_access) || empty($password_access) || empty($location_departament_id) ||
            empty($location_city_id))
        {
            $array_message = ['error' => true, 'message' => 'Todos los campos son obligatorios'];
            exit(json_encode($array_message));
        }

        if (!preg_match('/^[A-Za-z\s]+$/', $name_access) || !preg_match('/^[A-Za-z\s]+$/', $surname_access)) {
            $array_message = ['error' => true, 'message' => 'Los campos de nombre y apellido no deben contener números, solo letras y espacios'];
            exit(json_encode($array_message));
        }

        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*+#?&])[A-Za-z\d@$!%*+#?&]{8,}$/', $password_access)) {
            $array_message = ['error' => true, 'message' => 'La contraseña debe tener al menos 8 caracteres, incluir letras, números y caracteres especiales (@$!%*+#?&)'];
            exit(json_encode($array_message));
        }

        if (!preg_match('/^\d{10}$/', $phone_access)) {
            $array_message = ['error' => true, 'message' => 'El teléfono debe contener 10 números'];
            exit(json_encode($array_message));
        }

        if (!filter_var($email_access, FILTER_VALIDATE_EMAIL)) {
            $array_message = ['error' => true, 'message' => 'Ingrese un correo electrónico válido'];
            exit(json_encode($array_message));
        }

        if ($years_experience_access < 0 || $years_experience_access >= 100) {
            $array_message = ['error' => true, 'message' => 'Años de experiencia debe ser un número entre 0 y 99'];
            exit(json_encode($array_message));
        }

        $current_date = new DateTime();
        $date_birth = new DateTime($date_birth_access);
        $age_difference = $current_date->diff($date_birth)->y;
        if ($age_difference < 15) {
            $array_message = ['error' => true, 'message' => 'La fecha de nacimiento debe ser al menos 15 años antes de la fecha actual'];
            exit(json_encode($array_message));
        }

        if ($array_create) {
            $array_message = ['error' => true, 'message' => 'Correo o documento existentes'];
            exit(json_encode($array_message));
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo_person"])) {
                $targetDirectory = "public/img/";
                $imageFileType = strtolower(pathinfo($_FILES["photo_person"]["name"], PATHINFO_EXTENSION));
                $allowedExtensions = array('jpg');
                if (!in_array($imageFileType, $allowedExtensions)) {
                    $array_message = ['error' => true, 'message' => 'Lo siento, solo se permiten archivos JPG.'];
                    exit(json_encode($array_message));
                }
                $targetFile = $targetDirectory . $document_access . "." . $imageFileType;
                move_uploaded_file($_FILES["photo_person"]["tmp_name"], $targetFile);
                
            }
            $createUsersModel->insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access, $token_access, $location_departament_id, $location_city_id);
        }
    }
}
