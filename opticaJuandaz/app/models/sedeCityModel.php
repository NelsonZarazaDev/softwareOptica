<?php
class sedeCityModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateSedeCity()
    {
        $sql="SELECT s.*,c.name_city FROM optica.sede_city s inner join optica.city c
        on c.id_city=s.name_city_sede
        WHERE sede_state='t'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>