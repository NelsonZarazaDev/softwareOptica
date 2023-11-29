 <?php
    class checkAppointmentScheduleModel
    {
        private $connection;

        function __construct($connection)
        {
            $this->connection = $connection;
        }

        function paginateCheckAppointmentSchedule($cod_secretary)
        {
            $sql = "SELECT q.date_quote, q.hour_quote, p.name_person, p.surname_person, p.phone_person, q.token_quote FROM optica.quote q inner join optica.person p
            on (q.id_person=p.id_person)";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        function selectQuote($array)
        {
            $value = $array['value'];

            $sql = "SELECT q.date_quote, q.hour_quote,  p.name_person, p.surname_person, p.phone_person, p.document_person, q.token_quote, p.id_person, 
            (
                SELECT name_access 
                FROM optica.access 
                WHERE cod_employee = q.cod_expert
            ) AS name_optometrist,
            (
                SELECT surname_access 
                FROM optica.access 
                WHERE cod_employee = q.cod_expert
            ) AS surname_optometrist,
            (
                SELECT name_access 
                FROM optica.access 
                WHERE cod_employee = q.cod_secretary
            ) AS name_secretary,
            (
                SELECT surname_access 
                FROM optica.access 
                WHERE cod_employee = q.cod_secretary
            ) AS surname_secretary
        FROM 
            optica.quote q
        INNER JOIN 
            optica.person p ON q.id_person = p.id_person
        WHERE q.token_quote = '$value';";
            $this->connection->query($sql);
            return $this->connection->fetchall();
        }
    }
