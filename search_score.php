<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
include 'access.php';
expire("");


require_once 'app/common/connectionPDO.php';
include 'app/model/quanlydiem.php';
include 'app/controller/scoresController/scores_search.php';
