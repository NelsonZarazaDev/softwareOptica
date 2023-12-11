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
        $sql="SELECT * FROM optica.sede_city WHERE sede_state='t'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>