<?php
class loginModel
{
    private $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    function sqlFormSession($email, $password)
    {
        $sql = "SELECT * FROM optica.access WHERE email_access='$email' AND password_access='$password'";

        $this->connection->query($sql);

        return $this->connection->fetchAll();
    }
}
?>