<?php
function getConnexion()
{

    $host = "localhost";
    $dbname = "saint_benoit";
    $charset = "utf8";
    $user = "root";
    $password = "";

    try {
        return new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=' . $charset, $user, $password);
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }
}
function applyCORS()
{
    // Autoriser l'accès depuis n'importe quel domaine
    header("Access-Control-Allow-Origin: *");

    // Autoriser les méthodes HTTP spécifiques
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    // Autoriser les en-têtes spécifiques
    header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept");

    // // Indiquer si les cookies peuvent être inclus dans les requêtes
    // header("Access-Control-Allow-Credentials: true");

    // // Définir la durée de validité des résultats préalablement exposés en secondes
    // header("Access-Control-Max-Age: 3600");
}

