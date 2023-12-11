<?php
class clinicHistoryOptometristModel
{ 
    private $connection;
     function __construct($connection)
    {
        $this->connection = $connection;
    }

    function paginateClinicHistory($date,$cod_optometry)
    {
        $sql = "SELECT m.id_medical_history, p.document_person,p.phone_person,p.age_person,p.name_person,
        p.surname_person,p.birth_date_person, m.token_medical_history, m.hour_history
                from optica.person p inner join optica.medical_history m
                on p.id_person = m.id_person
                where m.date_history='$date' and m.cod_expert='$cod_optometry' order by m.id_medical_history DESC ";
        $this->connection->query($sql);
        return $this->connection->fetchAll();
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


     function updateHistory(
        $reason_history,
        $personal_history,
        $ocular_history,
        $family_history,
        $od_lensometry,
        $oi_lensometry,
        $farvisualacuityod_sc,
        $farvisualacuityoi_sc,
        $farvisualacuityod_cc,
        $farvisualacuityoi_cc,
        $farvisualacuityod_ph,
        $farvisualacuityoi_ph,
        $nearvisualacuity_a_od_sc,
        $acuityvisualnearoi_sc,
        $acuityvisualnearod_cc,
        $acuityvisualnearoi_cc,
        $acuityvisualnearod_ph,
        $acuityvisualnearoi_ph,
        $keratometriahorizontal_od,
        $keratometriahorizontal_oi,
        $keratometriavertical_od,
        $keratometriavertical_oi,
        $keratometriaeje_od,
        $keratometriaeje_oi,
        $refractionsphere_od,
        $refractionsphere_oi,
        $refractioncilindro_od,
        $refractioncilindro_oi,
        $refractionaxis_od,
        $refractionaxis_oi,
        $subjectivesphere_od,
        $subjectivesphere_oi,
        $subjectivecylinder_od,
        $subjectivecylinder_oi,
        $subjectiveeje_od,
        $subjectiveeje_oi,
        $subjectivedp_od,
        $subjectivedp_oi,
        $acuityvisualdistancefar_od,
        $acuityvisualdistancefar_oi,
        $acuityvisualdistancenear_od,
        $acuityvisualdistancenear_oi,
        $observation,
        $recommendation,
        $diagnostic,
        $token
    ) {
        $sql = "UPDATE optica.medical_history SET
        reason_history='$reason_history',
        personal_history='$personal_history',
        ocular_history='$ocular_history',
        family_history='$family_history',
        od_lensometry='$od_lensometry',
        oi_lensometry='$oi_lensometry',
        farvisualacuityod_sc='$farvisualacuityod_sc',
        farvisualacuityoi_sc='$farvisualacuityoi_sc',
        farvisualacuityod_cc='$farvisualacuityod_cc',
        farvisualacuityoi_cc='$farvisualacuityoi_cc',
        farvisualacuityod_ph='$farvisualacuityod_ph',
        farvisualacuityoi_ph='$farvisualacuityoi_ph',
        nearvisualacuity_a_od_sc='$nearvisualacuity_a_od_sc',
        acuityvisualnearoi_sc='$acuityvisualnearoi_sc',
        acuityvisualnearod_cc='$acuityvisualnearod_cc',
        acuityvisualnearoi_cc='$acuityvisualnearoi_cc',
        acuityvisualnearod_ph='$acuityvisualnearod_ph',
        acuityvisualnearoi_ph='$acuityvisualnearoi_ph',
        keratometriahorizontal_od='$keratometriahorizontal_od',
        keratometriahorizontal_oi='$keratometriahorizontal_oi',
        keratometriavertical_od='$keratometriavertical_od',
        keratometriavertical_oi='$keratometriavertical_oi',
        keratometriaeje_od='$keratometriaeje_od',
        keratometriaeje_oi='$keratometriaeje_oi',
        refractionsphere_od='$refractionsphere_od',
        refractionsphere_oi='$refractionsphere_oi',
        refractioncilindro_od='$refractioncilindro_od',
        refractioncilindro_oi='$refractioncilindro_oi',
        refractionaxis_od='$refractionaxis_od',
        refractionaxis_oi='$refractionaxis_oi',
        subjectivesphere_od='$subjectivesphere_od',
        subjectivesphere_oi='$subjectivesphere_oi',
        subjectivecylinder_od='$subjectivecylinder_od',
        subjectivecylinder_oi='$subjectivecylinder_oi',
        subjectiveeje_od='$subjectiveeje_od',
        subjectiveeje_oi='$subjectiveeje_oi',
        subjectivedp_od='$subjectivedp_od',
        subjectivedp_oi='$subjectivedp_oi',
        acuityvisualdistancefar_od='$acuityvisualdistancefar_od',
        acuityvisualdistancefar_oi='$acuityvisualdistancefar_oi',
        acuityvisualdistancenear_od='$acuityvisualdistancenear_od',
        acuityvisualdistancenear_oi='$acuityvisualdistancenear_oi',
        observation = UPPER('$observation'),
        recommendation = UPPER('$recommendation'),
        diagnostic = UPPER('$diagnostic')
            WHERE token_medical_history = '$token'";
        $this->connection->query($sql);
    } 
}
