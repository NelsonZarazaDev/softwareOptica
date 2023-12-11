<?php
class createUsersModel
{
    private $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    function diplicateCreate($email_access, $document_access)
    {
        $sql = "SELECT * FROM optica.access where email_access='$email_access' or document_access='$document_access'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function insertUser($id_role, $name_access, $surname_access, $document_access, $date_birth_access, $date_admission_access, $phone_access, $years_experience_access, $email_access, $address_access, $sex_access, $password_access, $token_access, $location_departament_id, $location_city_id, $sede_city)
    {
        $sql = "INSERT INTO optica.access (id_role, name_access, surname_access, document_access, date_birth_access, date_admission_access, phone_access, years_experience_access, email_access, address_access, sex_access, password_access, status_access, location_departament_id, location_city_id, token_access, sede_city)
        VALUES ('$id_role', UPPER('$name_access'), UPPER('$surname_access'), UPPER('$document_access'), '$date_birth_access', '$date_admission_access', '$phone_access', '$years_experience_access', '$email_access', UPPER('$address_access'), '$sex_access', '$password_access', 'true', '$location_departament_id', '$location_city_id', '$token_access','$sede_city')";
        $this->connection->query($sql);
    }
}
