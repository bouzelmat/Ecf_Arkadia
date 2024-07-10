<?php
require __DIR__ . '/Database.php'; 

use ecf_arkadia\Config\Database;

try {
    
    $database = new Database();
    
    $conn = $database->getConnection();

    if ($database->isConnected()) {
        echo "Connexion réussie à la base de données.\n";
    } else {
        echo "Échec de la connexion à la base de données.\n";
    }

    $database->closeConnection();
} catch (Exception $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage() . "\n";
}
?>
