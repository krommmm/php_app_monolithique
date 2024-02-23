<?php
require_once './controllers/auth.php';
require_once './controllers/home.php';
require_once './controllers/focus.php';

try {
    if (!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

        switch ($url[0]) {

            case 'home':
                if (empty($url[1])) {
                    home();
                } else {
                    throw new Exception('Page inconnue');
                }
                break;

            case 'focus':
                if (empty($url[1])) {
                    focus();
                } else {
                    throw new Exception('Page inconnue');
                }
                break;
            case 'auth':
                if (empty($url[1])) {
                    auth($_GET['action']);
                } else {
                    throw new Exception('Page inconnue');
                }
                break;
            default:
                throw new Exception('Page inconnue');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    require 'view/error.php';
}