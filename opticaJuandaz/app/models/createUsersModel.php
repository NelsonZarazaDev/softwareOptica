<?php
class createUsersModel
{
    private $connection;
  
    function __construct()
    { 
        $this->connection = new Connection();
    }

    function insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access, $token_access, $location_departament_id, $location_city_id)
    {
 
        $sql = "INSERT INTO optica.access (id_role,name_access,surname_access,document_access,date_birth_access,date_admission_access,phone_access,years_experience_access,email_access,address_access,sex_access,password_access,status_access,token_access,location_departament_id,location_city_id)
        VALUES ('$id_role', '$name_access', '$surname_access', '$document_access', '$date_birth_access', '$date_admission_access', '$phone_access', '$years_experience_access', '$email_access', '$address_access', '$sex_access', '$password_access', 'true','$token_access', '$location_departament_id', $location_city_id)";
        
        $this->connection->query($sql);
    }
} 
 