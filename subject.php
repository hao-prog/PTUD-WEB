<?php
session_start();
include 'access.php';
expire("");
require_once 'app/common/connectionPDO.php';
include 'app/model/subjects.php';
include 'app/controller/subjectsController.php';
