<?php
class branchOfficesModel
{
    private $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    function paginateSedeCity(){
        $sql="SELECT * FROM optica.sede_city";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function insertCity($city, $address, $state, $token_sede)
    {
        $sql = "INSERT INTO optica.sede_city (name_city,sede_address,sede_state,token_sede)
        VALUES (UPPER('$city'), UPPER('$address'), '$state', '$token_sede')";
        $this->connection->query($sql);
    }

    function updateSede($token_sede)
    {
        $sql = "SELECT * FROM optica.sede_city where token_sede='$token_sede'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function updateCity($city, $address, $status, $token)
    {
        $sql = "UPDATE optica.sede_city SET name_city=UPPER('$city'), sede_address=UPPER('$address'), sede_state='$status' WHERE token_sede='$token'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
