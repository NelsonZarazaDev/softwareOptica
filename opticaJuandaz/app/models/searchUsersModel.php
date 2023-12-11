<?php
class searchUsersModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function paginateSearchUsers()
    {
        $sql = "SELECT r.name_role, a.*, s.name_city, s.sede_address
        from optica.access a inner join optica.role r
        on (a.id_role=r.id_role)
		inner join optica.sede_city s
		on(a.sede_city=s.id_sede_city) order by a.id_access DESC";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }

    function selectUsers($array)
    {
        $field = $array['field'];
        $value = $array['value'];

        $sql = "SELECT r.name_role, a.*, s.name_city, s.sede_address
        from optica.access a inner join optica.role r
        on (a.id_role=r.id_role)
		inner join optica.sede_city s
		on(a.sede_city=s.id_sede_city)
        WHERE $field='$value'";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }

    function duplicateSearch($id_role_id, $id_role_name, $phone_access_id, $phone_access_name, $email_access_id, $email_access_name, $address_access_id, $address_access_name, $status_access_id, $status_access_name, $password_access_id, $password_access_name, $token_access, $sede_city)
    {
        $sql = "SELECT * FROM optica.access WHERE id_role='$id_role_name' and phone_access='$phone_access_id' and email_access='$email_access_id'
        and address_access='$address_access_id' and status_access='$status_access_id' and password_access='$password_access_id' and sede_city='$sede_city'";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }

    function updateSearchUsers($token_access, $id_role_id, $id_role_name, $phone_access_id, $phone_access_name, $email_access_id, $email_access_name, $address_access_id, $address_access_name, $status_access_id, $status_access_name, $password_access_id, $password_access_name, $sede_city)
    {
        $sql = "UPDATE optica.access SET 
        id_role = '$id_role_name', 
        phone_access = UPPER('$phone_access_name'),
        email_access = '$email_access_name',
        address_access = UPPER('$address_access_name'),
        status_access = '$status_access_name',
        password_access = '$password_access_name',
        sede_city='$sede_city'
        WHERE token_access = '$token_access'";
        $this->connection->query($sql);
    }

    function search($search)
    {
        $sql = "SELECT r.name_role, a.*, s.name_city, s.sede_address
        from optica.access a inner join optica.role r
        on (a.id_role=r.id_role)
		inner join optica.sede_city s
		on(a.sede_city=s.id_sede_city) WHERE a.cod_employee LIKE '%$search%' OR 
              a.document_access LIKE '%$search%' OR
              UPPER(a.name_access) LIKE UPPER('%$search%') OR
              UPPER(a.surname_access) LIKE UPPER('%$search%') OR  
              a.email_access LIKE '%$search%'";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }
}
