<?php

use app\config\Database;
use app\controllers\Controller;

require_once __DIR__ . '/../vendor/autoload.php';

Database::init();

new Controller();