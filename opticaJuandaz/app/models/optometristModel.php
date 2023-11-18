<?php
class optometristModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateOptometrist()
    {
        $sql="SELECT cod_employee, name_access, surname_access FROM optica.access WHERE id_role='R0002'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
?>