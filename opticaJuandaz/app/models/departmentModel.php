<?php
class departmentModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateDepartment()
    {
        $sql="SELECT * FROM optica.department";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>