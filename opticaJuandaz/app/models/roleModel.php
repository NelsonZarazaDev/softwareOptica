<?php
class roleModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateRole()
    {
        $sql="SELECT * FROM optica.role";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>