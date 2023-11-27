<?php
class statisticsModel
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function paginateStatistics($currentDate)
    {
        $sql = "SELECT
        (SELECT COUNT(*) FROM optica.quote where date_quote='$currentDate') AS quote,
        (SELECT COUNT(*) FROM optica.medical_history where date_history='$currentDate') AS medicalhistory";

        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function paginateSecretary($currentDate)
    {
        $sql = "SELECT a.name_access,a.document_access,
        (SELECT COUNT(id_medical_history) 
        FROM optica.medical_history mh 
        WHERE a.cod_employee = mh.cod_secretary 
        AND DATE(mh.date_history) = '$currentDate') AS quantity_clinical_stories,
        (SELECT COUNT(id_quote) 
        FROM optica.quote q 
        WHERE a.cod_employee = q.cod_secretary 
        AND DATE(q.date_quote) = '$currentDate') AS reserves_quantity
        FROM optica.access a
        WHERE a.id_role = 'R0000';";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function paginateOptometrist($currentDate)
    {
        $sql = "SELECT a.name_access, a.document_access,
        COUNT(mh.id_medical_history) AS quantity_clinical_stories
        FROM optica.access a LEFT JOIN optica.medical_history mh 
        ON a.cod_employee = mh.cod_expert
        WHERE a.id_role='R0002' AND mh.date_history = '$currentDate'
        GROUP BY a.name_access,a.document_access;";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
