<?php
class searchUsersModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection=$connection;
    }

    function paginateSearchUsers()
    {
        $sql="SELECT * FROM optica.access";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    } 

    function selectUsers($array)
    {
        $field=$array['field'];
        $value=$array['value'];

        $sql="SELECT * FROM optica.access WHERE $field='$value'";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }

    function updateSearchUsers($token_access,$id_role_id,$id_role_name,$phone_access_id,$phone_access_name,$email_access_id,$email_access_name,$address_access_id,$address_access_name,$status_access_id,$status_access_name,$password_access_id,$password_access_name)
    {
        $sql="UPDATE optica.access SET 
        id_role='$id_role_name',
        phone_access= '$phone_access_name',
        email_access = '$email_access_name',
        address_access = '$address_access_name',
        status_access = '$status_access_name',
        password_access = '$password_access_name'
        WHERE token_access ='$token_access' ";
        $this->connection->query($sql);
    }

    function search($search){
        $sql="SELECT * FROM optica.access WHERE id_access LIKE '%$search%' OR document_access LIKE '%$search%' OR email_access LIKE '%$search%'";
        $this->connection->query($sql);
        return $this->connection->fetchall();
    }
}