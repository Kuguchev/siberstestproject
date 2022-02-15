<?php

require_once './config/config.php';
require_once './config/autoloader.php';

session_start();

$app = new Router();
$app->run();