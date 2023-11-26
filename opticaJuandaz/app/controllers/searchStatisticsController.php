<?php
require_once "app/views/statisticsView.php";
require_once "app/models/searchStatisticsModel.php";
require_once "app/models/statisticsModel.php";

class searchStatisticsController{
    function searchTod(){
        $connection=new Connection();
        $searchStatisticsModel = new searchStatisticsModel($connection);
        $statisticsView= new statisticsView();
        $statisticsModel=new statisticsModel($connection);
        $date=$_POST['searchTod'];
        date_default_timezone_set('America/Bogota');
        $currentDate = date('Y-m-d');
        $array_day=$searchStatisticsModel->SearchTod($date);
        $array_secretary=$searchStatisticsModel->searchSecretary($date);
        $array_optometrist=$statisticsModel->paginateOptometrist($currentDate);
        $array_optometrist=$searchStatisticsModel->paginateOptometrist($date);
        $statisticsView->paginateStatistics($array_day,$array_secretary,$array_optometrist);
    }

    function searchSecretary(){
        $connection=new Connection();
        $statisticsView= new statisticsView();
        $statisticsModel=new statisticsModel($connection);
        $date=$_POST['searchSecretary'];
        date_default_timezone_set('America/Bogota');
        $currentDate = date('Y-m-d');
        $array_day=$statisticsModel->paginateStatistics($currentDate);
        $array_secretary=$statisticsModel->paginateSecretary($currentDate);
        $array_optometrist=$statisticsModel->paginateOptometrist($currentDate);
        $statisticsView->paginateStatistics($array_day,$array_secretary,$array_optometrist);
    }
}