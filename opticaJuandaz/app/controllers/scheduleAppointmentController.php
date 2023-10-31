<?php
require_once "app/views/scheduleAppointmentView.php";
require_once "app/models/scheduleAppointmentModel.php";

class scheduleAppointmentController
{
    function paginateScheduleAppointment()
    {
        $scheduleAppointmentView=new scheduleAppointmentView();
        $scheduleAppointmentView->paginateScheduleAppointment();

    }
}