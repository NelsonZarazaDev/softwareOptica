<?php
class cityModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateCity()
    {
        $sql="SELECT * FROM optica.city order by name_city";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>