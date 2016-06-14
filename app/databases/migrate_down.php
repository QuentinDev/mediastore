<?php
namespace app\databases;

use app\config\Config;
use app\config\Database;
use app\databases\migrations\Article;
use app\databases\migrations\Commande;
use app\databases\migrations\Magasin;
use app\databases\migrations\User;
use app\databases\migrations\Contient;
use app\databases\migrations\Stock;

require_once 'vendor/autoload.php';

// configuration du mode debug
ini_set('display_errors', Config::get('debug'));

// configuration de la timezone
date_default_timezone_set(Config::get('timezone'));

// Configuration de  l'orm
Database::init(Config::get('database'));

$tables = [];

$tables[] = new Contient();
$tables[] = new Stock();
$tables[] = new Article();
$tables[] = new Commande();
$tables[] = new Magasin();
$tables[] = new User();

foreach ($tables as $table) {
    $table->down();
}

