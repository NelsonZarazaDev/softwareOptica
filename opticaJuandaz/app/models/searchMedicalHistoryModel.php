<?php
class searchMedicalHistoryModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection=$connection;
        
    }
    function paginateSearchMedicalHistory()
    {
        $sql="SELECT * from optica.person";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    } 
    function buscar($buscar){
        $sql="SELECT * from optica.person";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }
}