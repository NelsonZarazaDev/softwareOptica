 <?php
    class scheduleAppointmentModel
    {
        private $connection; 

        function __construct($connection)
        {
            $this->connection = $connection;
        }

        function duplicateSchedule($hour, $date)
        {
            if ($hour and $date) {
                $sql = "SELECT date_quote,hour_quote FROM optica.quote where date_quote='$date' AND hour_quote = '$hour'";
            } else {
                $sql = "SELECT date_quote,hour_quote FROM optica.quote where date_quote='$date' AND hour_quote != '$hour'";
            }
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        function duplicatePerson($document){
            $sql="SELECT * FROM optica.person where document_person='$document'";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        function insertPerson($name, $surname, $document, $phone,$department,$city)
        {
            $sql = "INSERT INTO optica.person (name_person, document_person, phone_person, surname_person, location_department_id, location_city_id)
        VALUES ('$name', '$document', '$phone', '$surname', '$department', '$city')";
            $this->connection->query($sql);
        }

        function showId($document, $phone)
        {
            $sql = "SELECT id_person from optica.person where document_person='$document' and phone_person='$phone'";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        }

        function insertSchedule($id_person, $hour, $date, $cod_secretary, $token)
        {
            $sql = "INSERT INTO optica.quote (id_person,date_quote,hour_quote,cod_secretary,token_quote)
        VALUES ('$id_person','$date','$hour','$cod_secretary','$token')";
            $this->connection->query($sql);
        }

        function paginateScheduleAppointment($cod_secretary)
        {
            $sql = "SELECT q.date_quote, q.hour_quote, p.name_person, p.surname_person, p.phone_person, q.token_quote FROM optica.quote q inner join optica.person p
            on (q.id_person=p.id_person) WHERE cod_secretary='$cod_secretary'";
            $this->connection->query($sql);
            return $this->connection->fetchAll();
        } 

        function selectQuote($array)
        {
            $value = $array['value'];

            $sql = "SELECT q.date_quote, q.hour_quote, p.name_person, p.surname_person, p.phone_person, p.document_person, q.token_quote, p.id_person
        FROM optica.quote q inner join optica.person p
        on (q.id_person=p.id_person) WHERE token_quote='$value'";
            $this->connection->query($sql);
            return $this->connection->fetchall();
        }

        function updatePerson($id_person, $phone_person_id, $phone_person_name)
        {
            $sql = "UPDATE optica.person SET 
        phone_person = '$phone_person_name'
        WHERE id_person = '$id_person'";
            $this->connection->query($sql);
        }
        function updateSchedule($token, $hour_quote_name, $hour_quote_id, $date_quote_name, $date_quote_id)
        {
            $sql = "UPDATE optica.quote SET 
        hour_quote = '$hour_quote_name',
        date_quote = '$date_quote_name'
        WHERE token_quote = '$token'";
            $this->connection->query($sql);
        }
        
        function deleteSchedule($token)
        {
            $sql = "DELETE FROM optica.quote WHERE token_quote = '$token'";
            $this->connection->query($sql);
        }
    }
