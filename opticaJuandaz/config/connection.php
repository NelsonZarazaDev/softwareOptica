<?php
require_once "../private/setting_connection.php";

class Connection
{
    private $link;
    private $result;

    function __construct()
    {
        $host = HOST;
        $port = PORT;
        $dbname = DBNAME;
        $user = USER;
        $password = PASSWORD;

        $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

        $this->link = pg_connect($conn_string);
        if (!$this->link) {
            exit('Error de conexión: ' . pg_last_error());
        }
    }

    function query($sql)
    {
        $this->result = pg_query($this->link, $sql) or exit('Consulta mal estructurada');
    }

    function fetchAll()
    {
        return pg_fetch_all($this->result);
    }
}
?>
