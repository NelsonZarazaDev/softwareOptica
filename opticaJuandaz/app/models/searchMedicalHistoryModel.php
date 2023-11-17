<?php
class searchMedicalHistoryModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection=$connection;
        
    }
}