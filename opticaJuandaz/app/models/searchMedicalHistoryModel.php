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
        $sql="SELECT m.id_medical_history, p.document_person,p.phone_person,p.age_person,p.name_person,
        p.surname_person,p.birth_date_person, m.token_medical_history
                from optica.person p inner join optica.medical_history m
                on p.id_person = m.id_person
				order by m.id_medical_history DESC ";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    } 

    function viewClinicHistory($array){
        $field=$array['field'];
        $value=$array['value'];
        $sql="SELECT p.*, m.*, c.name_city, d.name_department, a.name_access, a.surname_access
        FROM optica.person p
        INNER JOIN optica.medical_history m ON p.id_person = m.id_person
        INNER JOIN optica.city c ON p.location_city_id = c.id_city
        INNER JOIN optica.department d ON p.location_department_id = d.id_department
        INNER JOIN optica.access a ON m.cod_expert = a.cod_employee
        WHERE $field='$value'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function buscar($buscar){
        $sql="SELECT * from optica.person";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }
}