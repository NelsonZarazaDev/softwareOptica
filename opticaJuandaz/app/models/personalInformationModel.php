<?php
class personalInformationModel{
    private $connection;

    function __construct()
    {
        $this->connection=new Connection();
    }
    function info($codEmployee){
        $sql="SELECT r.name_role,a.cod_employee,a.name_access,a.surname_access,a.document_access,a.date_birth_access, a.date_admission_access,
        a.phone_access,a.years_experience_access, a.email_access, a.address_access, a.sex_access, c.name_city, d.name_department
        from optica.access a inner join optica.role r
        on (a.id_role = r.id_role)
        inner join optica.city c 
        on (c.id_city=a.location_city_id)
        inner join optica.department d
        on (d.id_department=a.location_departament_id)
        WHERE a.cod_employee='$codEmployee'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}