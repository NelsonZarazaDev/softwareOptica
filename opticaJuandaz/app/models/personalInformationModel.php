<?php
class personalInformationModel{
    private $connection;

    function __construct()
    {
        $this->connection=new Connection();
    }
    function info($token){
        $sql="SELECT * from optica.access WHERE token_access='$token'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}