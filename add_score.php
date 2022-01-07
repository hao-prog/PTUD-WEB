<?php
<<<<<<< HEAD
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
include 'access.php';
expire("");

require_once 'app/common/connectionPDO.php';
include 'app/model/quanlydiem.php';
include 'app/controller/scoresController/scores_add.php';
=======
require_once 'app/common/connectionPDO.php';
include 'app/model/quanlydiem.php';
include 'app/controller/scoresController/scores_add.php';
>>>>>>> 05c842e41de016a75c71368028c61e25ad41f279
