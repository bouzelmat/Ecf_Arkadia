<?php
namespace ecf_arkadia\Config;

use MongoDB\Client;

class MongoDBConnection {
    private $uri;
    private $client;

    public function __construct() {
        // charge les informations de connexion depuis le fichier de configuration
        $config = require __DIR__ . '/mongo_config.php';
        $this->uri = $config['mongo_uri'] ?? "mongodb://localhost:27017";
    }

    // établit une connexion à mongoDB ou retourne une connexion existante.
    public function connect() {
        if ($this->client === null) {
            try {
                $this->client = new Client($this->uri);
                // vérifier la connexion
                $this->client->listDatabases();
            } catch (\Exception $e) {
                // journaliser l'erreur
                error_log("Erreur de connexion MongoDB : " . $e->getMessage());
                throw new \Exception("Erreur de connexion à MongoDB");
            }
        }
        return $this->client;
    }
}