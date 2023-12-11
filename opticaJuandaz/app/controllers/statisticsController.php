<?php
require_once "app/models/statisticsModel.php";
require_once "app/views/statisticsView.php";

class statisticsController
{ 
    function paginateStatistics()
    {
        $connection = new connection();
        $statisticsModel = new statisticsModel($connection);
        $statisticsView = new statisticsView();
        date_default_timezone_set('America/Bogota');
        $currentDate = date('Y-m-d');
        $array_day = $statisticsModel->paginateStatistics($currentDate);
        $array_secretary = $statisticsModel->paginateSecretary($currentDate);
        $array_optometrist = $statisticsModel->paginateOptometrist($currentDate);
        $statisticsView->paginateStatistics($array_day, $array_secretary, $array_optometrist, $currentDate);
    }
}
 