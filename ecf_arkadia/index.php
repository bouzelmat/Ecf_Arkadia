<?php
// définition de l'environnement
define('ENVIRONMENT', 'development');

// configuration de l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use ecf_arkadia\Config\Database;
use ecf_arkadia\Config\MongoDBConnection;

try {
    $dbRelational = new Database();
    $connRelational = $dbRelational->getConnection();
    
    $mongoDb = new MongoDBConnection();
    $connMongo = $mongoDb->connect();

    // Initialisation des objets globaux
    $app = new \stdClass();
    $app->db = $connRelational;
    $app->mongo = $connMongo;

    // redirection vers la page d'accueil
    header('Location: views/zoo_arkadia_accueil.php');
    exit();

} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage();
    exit(1);
}

if (isset($connRelational)) {
    $connRelational->close();
}
