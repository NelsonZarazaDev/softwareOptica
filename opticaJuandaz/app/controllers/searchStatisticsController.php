<?php
require_once "app/views/statisticsView.php";
require_once "app/models/searchStatisticsModel.php";
require_once "app/models/statisticsModel.php";

class searchStatisticsController
{
    function searchTod()
    {
        $connection = new Connection();
        $searchStatisticsModel = new searchStatisticsModel($connection);
        $statisticsView = new statisticsView();

        $date = $_POST['searchTod'];

        if (empty($date)) {
            $array_message = ['error' => true, 'message' => 'Campo vacio'];
            exit(json_encode($array_message));
        } else {
            $array_day = $searchStatisticsModel->SearchTod($date);
            $array_secretary = $searchStatisticsModel->paginateSecretary($date);
            $array_optometrist = $searchStatisticsModel->paginateOptometrist($date);
            $statisticsView->paginateStatistics($array_day, $array_secretary, $array_optometrist, $date);
        }
    }
}
