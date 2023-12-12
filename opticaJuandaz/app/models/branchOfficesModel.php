<?php
class branchOfficesModel
{
    private $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    function paginateSedeCity()
    {
        $sql = "SELECT s.*, c.name_city, d.name_department
        FROM optica.sede_city s
        INNER JOIN optica.city c 
        ON s.name_city_sede = c.id_city AND s.department_sede = c.id_department
        INNER JOIN optica.department d
        ON s.department_sede = d.id_department";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function insertCity($city, $departament, $address, $state, $token_sede)
    {
        $sql = "INSERT INTO optica.sede_city (name_city_sede,sede_address,sede_state,token_sede,department_sede)
        VALUES ('$city', UPPER('$address'), '$state', '$token_sede', '$departament')";
        $this->connection->query($sql);
    }

    function updateSede($token_sede)
    {
        $sql = "SELECT s.*, c.name_city as city, d.name_department
        FROM optica.sede_city s
        INNER JOIN optica.city c 
        ON s.name_city_sede = c.id_city AND s.department_sede = c.id_department
        INNER JOIN optica.department d
        ON s.department_sede = d.id_department
        where token_sede='$token_sede'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function updateCity($address, $status, $token)
    {
        $sql = "UPDATE optica.sede_city SET sede_address=UPPER('$address'), sede_state='$status' WHERE token_sede='$token'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function duplicateSede($city, $departament, $address)
    {
        $sql = "SELECT * FROM optica.sede_city WHERE sede_address = UPPER('$address') AND name_city_sede = '$city' AND department_sede = '$departament';";

        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
