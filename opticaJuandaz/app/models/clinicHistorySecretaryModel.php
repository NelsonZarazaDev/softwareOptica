<?php
class clinicHistorySecretaryModel
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
 
    function paginateClinicHistory($date)
    {
        $sql = "SELECT m.id_medical_history, p.document_person,p.phone_person,p.age_person,p.name_person,
        p.surname_person,p.birth_date_person, m.token_medical_history, m.hour_history
                from optica.person p inner join optica.medical_history m
                on p.id_person = m.id_person
                where m.date_history='$date' order by m.id_medical_history DESC ";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function searchPerson($document)
    {
        $sql = "SELECT * FROM optica.person WHERE document_person='$document'";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
    }

    function searchDocument($document)
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
        LEFT JOIN optica.medical_history m ON p.id_person = m.id_person
        INNER JOIN optica.city c ON p.location_city_id = c.id_city
        INNER JOIN optica.department d ON p.location_department_id = d.id_department
        LEFT JOIN optica.access a ON m.cod_expert = a.cod_employee
        where p.document_person='$document'";
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
        $ageHistory,
        $occupationHistory,
        $id_department,
        $id_city,
        $tokenHistorySecretaryUpdate
    ) {
        $sql = "UPDATE optica.person SET
        name_person='$nameHistory',
        surname_person='$surnameHistory',
        phone_person='$phoneHistory',
        address_person='$addressHistory',
        birth_date_person='$birthDateHistory',
        healthcare_entity_person='$healthcareEntityHistory',
        occupation_person='$occupationHistory',
        age_person='$ageHistory',
        location_department_id='$id_department',
        location_city_id='$id_city' 
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
        $ageHistory,
        $occupationHistory,
        $tokenHistorySecretaryCreate
    ) {
        $sql = "INSERT INTO optica.person (name_person,surname_person,document_person,healthcare_entity_person,
        occupation_person,birth_date_person,age_person,phone_person,
        location_department_id,location_city_id,address_person,token_person)
        VALUES ('$nameHistory','$surnameHistory','$document_person','$healthcareEntityHistory','$occupationHistory','$birthDateHistory','$ageHistory','$phoneHistory','$id_department','$id_city','$addressHistory','$tokenHistorySecretaryCreate')";
        $this->connection->query($sql);
    }

    function createHistory($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $id_optometrist, $id_Person, $dateCreation, $hour, $token)
    {
        $sql = "INSERT INTO optica.medical_history(id_person,cod_expert,date_history,hour_history,reason_history,ocular_history,family_history,personal_history,name_companion,surname_companion,phone_companion,relationship_companion,token_medical_history) VALUES ('$id_Person','$id_optometrist','$dateCreation','$hour','$reasonQueryHistory','$OcularBackgroundHistory','$familyBackgroundHistory','$personalHistory','$nameCompanionHistory','$surnameCompanionHistory','$phoneCompanionHistory','$relationshipHistory','$token')";
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
        healthcare_entity_person='$healthcareEntityHistory',
        occupation_person='$occupationHistory',
        location_department_id='$id_department',
        location_city_id='$id_city' 
        WHERE token_person='$tokenHistorySecretary'";
        $this->connection->query($sql);
    }

    function updateHistoryUpdate($relationshipHistory, $nameCompanionHistory, $surnameCompanionHistory, $phoneCompanionHistory, $reasonQueryHistory, $personalHistory, $OcularBackgroundHistory, $familyBackgroundHistory, $tokenHistory)
    {
        $sql = "UPDATE optica.medical_history SET
        reason_history='$reasonQueryHistory',
        personal_history='$personalHistory',
        ocular_history='$OcularBackgroundHistory',
        family_history='$familyBackgroundHistory',
        name_companion='$nameCompanionHistory',
        surname_companion='$surnameCompanionHistory',
        phone_companion='$phoneCompanionHistory',
        relationship_companion='$relationshipHistory'

        WHERE token_medical_history='$tokenHistory'";
        $this->connection->query($sql);
    }
}
