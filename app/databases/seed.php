<?php
namespace app\databases;

use app\config\Config;
use app\config\Database;
use app\databases\seeds\Magasin;
use app\databases\seeds\Article;
use app\databases\seeds\Type;
use app\databases\seeds\User;
use app\databases\seeds\Article_Commande;
use app\databases\seeds\Article_Magasin;

require_once 'vendor/autoload.php';

// configuration du mode debug
ini_set('display_errors', Config::get('debug'));

// configuration de la timezone
date_default_timezone_set(Config::get('timezone'));

// Configuration de  l'orm
Database::init(Config::get('database'));

$tables = [];

$tables[] = new User();
$tables[] = new Type();
$tables[] = new Article();
$tables[] = new Magasin();
$tables[] = new Article_Magasin();

foreach ($tables as $table) {
    $table->run();
}
