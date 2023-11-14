<?php
class createUsersModel
{
    private $connection;
  
    function __construct()
    { 
        $this->connection = new Connection();
    }
 
    function insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access, $token_access, $location_departament_id, $location_city_id, $location_address)
    {
 
        $sql = "INSERT INTO optica.access (id_role,name_access,surname_access,document_access,date_birth_access,date_admission_access,phone_access,years_experience_access,email_access,address_access,sex_access,password_access,status_access,location_address,location_departament_id,location_city_id,token_access)
        VALUES ('$id_role', '$name_access', '$surname_access', '$document_access', '$date_birth_access', '$date_admission_access', '$phone_access', '$years_experience_access', '$email_access', '$address_access', '$sex_access', '$password_access', 'true', '$location_address', '$location_departament_id', $location_city_id,'$token_access')";
        $this->connection->query($sql);
    }
} 
 