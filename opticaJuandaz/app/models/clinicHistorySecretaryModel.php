<?php
class clinicHistorySecretaryModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function paginateClinicHistory($date, $cod_secretary)
    {
        $sql = "SELECT m.id_medical_history, p.document_person,p.phone_person,p.age_person,p.name_person,
        p.surname_person,p.birth_date_person, m.token_medical_history, m.hour_history
                from optica.person p inner join optica.medical_history m
                on p.id_person = m.id_person
                where m.date_history='$date' and m.cod_secretary='$cod_secretary' order by m.id_medical_history DESC ";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function searchPerson($document)
    {
        $sql = "SELECT * FROM optica.person WHERE document_person='$document'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function searchDocument($document,$date)
    {
        $sql = "SELECT p.*, m.id_medical_history,
        m.od_lensometry,
        m.oi_lensometry,
        m.add_lensometry,
        m.farvisualacuityod_sc,
        m.farvisualacuityoi_sc,
        m.farvisualacuityod_cc,
        m.farvisualacuityoi_cc,
        m.farvisualacuityod_ph,
        m.farvisualacuityoi_ph,
        m.nearvisualacuity_a_od_sc,
        m.acuityvisualnearoi_sc,
        m.acuityvisualnearod_cc,
        m.acuityvisualnearoi_cc,
        m.acuityvisualnearod_ph,
        m.acuityvisualnearoi_ph,
        m.keratometriahorizontal_od,
        m.keratometriahorizontal_oi,
        m.keratometriavertical_od,
        m.keratometriavertical_oi,
        m.keratometriaeje_oi,
        m.keratometriadifferential_od,
        m.keratometriadifferential_oi,
        m.refractionsphere_od,
        m.refractionsphere_oi,
        m.refractioncilindro_od,
        m.refractionaxis_od,
        m.refractionaxis_oi,
        m.refractionaddition_od,
        m.refractionaddition_oi,
        m.subjectivesphere_od,
        m.subjectivesphere_oi,
        m.subjectivecylinder_od,
        m.subjectivecylinder_oi,
        m.subjectiveeje_od,
        m.subjectiveeje_oi,
        m.subjectiveadd_od,
        m.subjectiveadd_oi,
        m.subjectivedp_od,
        m.acuityvisualdistancefar_od,
        m.acuityvisualdistancefar_oi,
        m.acuityvisualdistancenear_od,
        m.acuityvisualdistancenear_oi,
        m.observation,
        m.recommendation,
        m.diagnostic,
        m.token_medical_history,
        m.cod_expert,
        m.date_history,
        m.hour_history,
        m.reason_history,
        m.personal_history,
        m.ocular_history,
        m.family_history,
        m.subjectivedp_oi, 
        m.refractioncilindro_oi,
        m.keratometriaeje_od,
        m.keratometriaeje_od, c.name_city, d.name_department, a.name_access, a.surname_access
        FROM optica.person p
        LEFT JOIN 
        optica.medical_history m ON p.id_person = m.id_person
        INNER JOIN 
        optica.city c ON p.location_city_id = c.id_city
        INNER JOIN 
        optica.department d ON p.location_department_id = d.id_department
        LEFT JOIN 
        optica.access a ON m.cod_expert = a.cod_employee
        LEFT JOIN 
        optica.quote q ON p.id_person = q.id_person
        where p.document_person='$document' AND q.date_quote = '$date';";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function updatePerson(
        $nameHistory,
        $surnameHistory,
        $phoneHistory,
        $addressHistory,
        $birthDateHistory,
        $healthcareEntityHistory,
        $occupationHistory,
        $id_department,
        $id_city,
        $tokenHistorySecretaryUpdate,
    ) {
        $sql = "UPDATE optica.person SET
        name_person = UPPER('$nameHistory'),
        surname_person = UPPER('$surnameHistory'),
        phone_person = UPPER('$phoneHistory'),
        address_person = UPPER('$addressHistory'),
        birth_date_person = '$birthDateHistory',
        healthcare_entity_person = UPPER('$healthcareEntityHistory'),
        occupation_person = UPPER('$occupationHistory'),
        location_department_id = '$id_department',
        location_city_id = '$id_city'
        WHERE token_person='$tokenHistorySecretaryUpdate'";
        $this->connection->query($sql);
    }

    function createPerson(
        $document_person,
        $nameHistory,
        $surnameHistory,
        $phoneHistory,
        $id_department,
        $id_city,
        $addressHistory,
        $birthDateHistory,
        $healthcareEntityHistory,
        $occupationHistory,
        $tokenHistorySecretaryCreate,
    ) {
        $sql = "INSERT INTO optica.person (name_person, surname_person, document_person, healthcare_entity_person,
        occupation_person, birth_date_person, phone_person,
        location_department_id, location_city_id, address_person, token_person)
        VALUES (
            UPPER('$nameHistory'),
            UPPER('$surnameHistory'),
            UPPER('$document_person'),
            UPPER('$healthcareEntityHistory'),
            UPPER('$occupationHistory'),
            '$birthDateHistory',
            UPPER('$phoneHistory'),
            '$id_department',
            '$id_city',
            UPPER('$addressHistory'),
            '$tokenHistorySecretaryCreate'
        )";
        $this->connection->query($sql);
    }

    function createHistory($cod_secretary, $relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $id_optometrist, $id_Person, $dateCreation, $hour, $token, $sede_city)
    {
        $sql = "INSERT INTO optica.medical_history(id_person, cod_expert, date_history, hour_history, reason_history, ocular_history, family_history, personal_history, name_companion, surname_companion, phone_companion, relationship_companion, token_medical_history, cod_secretary, sede_city) 
        VALUES (
            '$id_Person',
            '$id_optometrist',
            '$dateCreation',
            '$hour',
            UPPER('$reasonQueryHistory'),
            UPPER('$OcularBackgroundHistory'),
            UPPER('$familyBackgroundHistory'),
            UPPER('$personalHistory'),
            UPPER('$nameCompanionHistory'),
            UPPER('$surnameCompanionHistory'),
            UPPER('$phoneCompanionHistory'),
            UPPER('$relationshipHistory'),
            '$token',
            '$cod_secretary',
            '$sede_city'
        )";

        $this->connection->query($sql);
    }

    function selectHistoryClinic($array)
    {
        $field = $array['field'];
        $value = $array['value'];
        $sql = "SELECT p.*, m.*, c.name_city, d.name_department, a.name_access, a.surname_access
        from optica.person p inner join optica.medical_history m
        on p.id_person = m.id_person
        inner join optica.city c
        on p.location_city_id = c.id_city
        inner join optica.department d
        on p.location_department_id = d.id_department
        inner join optica.access a
        on m.cod_expert= a.cod_employee
        where m.$field='$value'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function updatePersonHistory($id_department, $id_city, $healthcareEntityHistory, $occupationHistory, $tokenHistorySecretary)
    {
        $sql = "UPDATE optica.person SET
        healthcare_entity_person = UPPER('$healthcareEntityHistory'),
        occupation_person = UPPER('$occupationHistory'),
        location_department_id = '$id_department',
        location_city_id = '$id_city'
        WHERE token_person = '$tokenHistorySecretary'";
        $this->connection->query($sql);
    }

    function updateHistoryUpdate($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $tokenHistory, $sede_city)
    {
        $sql = "UPDATE optica.medical_history SET
        reason_history = UPPER('$reasonQueryHistory'),
        personal_history = UPPER('$personalHistory'),
        ocular_history = UPPER('$OcularBackgroundHistory'),
        family_history = UPPER('$familyBackgroundHistory'),
        name_companion = UPPER('$nameCompanionHistory'),
        surname_companion = UPPER('$surnameCompanionHistory'),
        phone_companion = UPPER('$phoneCompanionHistory'),
        relationship_companion = UPPER('$relationshipHistory'),
        sede_city='$sede_city'
        WHERE token_medical_history = '$tokenHistory'";
        $this->connection->query($sql);
    }

    function searchCity($department)
    {
        $sql = "SELECT c.*,d.name_department FROM optica.city c
        inner join optica.department d on d.id_department=c.id_department
        where c.id_department='$department'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }
}
