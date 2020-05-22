<?php 

ini_set('display_errors', 1);

require_once 'app/views/view.php';
require_once 'app/controllers/Controller.php';
require_once 'app/models/Model.php';
require_once 'app/route.php';
session_start();

$m = new Route;
$m->start();
