<?php

class searchStatisticsModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function SearchTod($date)
    {
        $sql = "SELECT
        (SELECT COUNT(*) FROM optica.quote where date_quote='$date') AS quote,
        (SELECT COUNT(*) FROM optica.medical_history where date_history='$date') AS medicalhistory";

        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function paginateSecretary($date)
    {
        $sql = "SELECT 
        a.name_access,
        a.document_access,
        (SELECT COUNT(id_medical_history) 
            FROM optica.medical_history mh 
            WHERE a.cod_employee = mh.cod_secretary 
            AND mh.date_history = '$date'
        ) AS quantity_clinical_stories,

        (SELECT COUNT(id_quote) 
            FROM optica.quote q 
            WHERE a.cod_employee = q.cod_secretary 
            AND q.date_quote = '$date'
        ) AS reserves_quantity
        FROM optica.access a
        WHERE  a.id_role = 'R0000'
        AND (EXISTS (
                SELECT 1
                FROM optica.medical_history mh
                WHERE a.cod_employee = mh.cod_secretary
                AND mh.date_history = '$date'
            )OR
            EXISTS (
                SELECT 1
                FROM optica.quote q
                WHERE a.cod_employee = q.cod_secretary
                AND q.date_quote = '$date'
            )
        )";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function paginateOptometrist($date)
    {
        $sql = "SELECT a.name_access, a.document_access,
        COUNT(mh.id_medical_history) AS quantity_clinical_stories
        FROM optica.access a LEFT JOIN optica.medical_history mh 
        ON a.cod_employee = mh.cod_expert
        WHERE a.id_role='R0002' AND mh.date_history = '$date'
        GROUP BY a.name_access,a.document_access";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
