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
        $sql = "SELECT a.name_access, a.document_access,
        COUNT(mh.id_medical_history) AS quantity_clinical_stories,
        COUNT(q.id_quote) AS reserves_quantity
        FROM optica.access a LEFT JOIN optica.medical_history mh 
        ON a.cod_employee = mh.cod_expert
        LEFT JOIN optica.quote q 
        ON a.cod_employee = q.cod_secretary 
        WHERE a.id_role='R0000' AND (mh.date_history = '$currentDate' OR q.date_quote = '$currentDate')
        GROUP BY a.name_access,a.document_access";
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
