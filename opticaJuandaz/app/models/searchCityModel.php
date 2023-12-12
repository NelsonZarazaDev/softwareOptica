<?php
class searchCityModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }


    function searchCity($department)
    {
        $sql = "SELECT c.*,d.name_department FROM optica.city c
        inner join optica.department d on d.id_department=c.id_department
        where c.id_department='$department'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    
}
