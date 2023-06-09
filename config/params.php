<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'forum',
        'DB_USER' => 'root',
        'DB_PSWD' => '',
    ],
    'app' => [
        'name' => 'Forum',
        'projectBaseUrl' => 'http://localhost/Monforum'
    ]
];

/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */
const BASE_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR  ;
// constantes à appeler dans l'html
const BASE= CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
const UPLOAD = CONFIG['app']['projectBaseUrl'] . '/public/upload/';
// constantes à appeler dans le php
const PUBLIC_FOLDER = BASE_DIR . 'public\\';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';


/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    ''                  => ['AppController', 'index'],
    '/'                 => ['AppController', 'index'],
    '/inscription'     => ['SecurityController', 'inscription'],
    '/connexion'      =>['SecurityController', 'connexion'],
    '/deconnexion'     =>['SecurityController', 'deconnexion'],
    '/topic/create'   => ['AppController', 'topicCreate'],
    '/topic/voir'    => ['AppController', 'tchat'],
    '/topic/supprimer' => ['AppController', 'supprimerTopic']



];
