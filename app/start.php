<?php
session_start();
require_once 'vendor/autoload.php';

use app\config\Database;
use app\config\Router;
use app\config\Config;

// configuration du mode debug
ini_set('display_errors', Config::get('debug'));

// configuration de la timezone
date_default_timezone_set(Config::get('timezone'));

// Configuration de  l'orm
Database::init(Config::get('database'));

// Configuration du router
Router::init();
