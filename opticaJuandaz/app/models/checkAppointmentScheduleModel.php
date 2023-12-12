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

            $sql = "SELECT 
            q.date_quote, 
            q.hour_quote,  
            p.name_person, 
            p.surname_person, 
            p.phone_person, 
            p.document_person, 
            q.token_quote, 
            p.id_person, 
            s.name_city_sede, 
            s.sede_address,
            oa.name_access AS name_optometrist,
            oa.surname_access AS surname_optometrist,
            sa.name_access AS name_secretary,
            sa.surname_access AS surname_secretary
        FROM 
            optica.quote q
        INNER JOIN 
            optica.person p ON q.id_person = p.id_person
        INNER JOIN 
            optica.sede_city s ON q.sede_city = s.id_sede_city
        LEFT JOIN 
            optica.access oa ON q.cod_expert = oa.cod_employee
        LEFT JOIN 
            optica.access sa ON q.cod_secretary = sa.cod_employee
        WHERE q.token_quote = '$value';";
            $this->connection->query($sql);
            return $this->connection->fetchall();
        }
    }
