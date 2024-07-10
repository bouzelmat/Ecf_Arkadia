<?php
require __DIR__ . '/../vendor/autoload.php';
echo "Autoloader chargé avec succès.\n";

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");
echo "Connexion à MongoDB réussie.\n";
