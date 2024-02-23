<?php
require_once 'vendor/autoload.php';
require_once './models/utils.php';
require_once './models/auth.php';
use Ramsey\Uuid\Uuid;

function auth($action)
{
    switch ($action) {
        case 'signup':
            signup();
            break;

        case 'login':
            login();
            break;

        case 'disconect':
            disconect();
            break;

        default:
            throw new Exception('page inconnue');
    }
}

function signup()
{
    $uuid = Uuid::uuid4();
    $uuidString = $uuid->toString();

    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['secret_key']) && !empty($_POST['secret_key'])) {

        $users = getUsers();
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $secret_key = htmlspecialchars($_POST['secret_key']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: auth?action=signup&error=1&message=Votre adresse email est invalide');
            exit();
        }

        $isEmailTaken = false;
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['email'] === $email) {
                $isEmailTaken = true;
            }
        }

        if($secret_key!=="23455sfSFs476RT5@@fdg2344fdg5823@@@234d5sf746"){
            header('location: auth?action=signup&error=1&message=Impossible de s\'inscrire !');
            exit();
        }

        if ($isEmailTaken) {
            header('location: auth?action=signup&error=1&message=Impossible de s\'inscrire !');
            exit();
        } else {
            $uuid = Uuid::uuid4();
            $uuidString = $uuid->toString();
            $uuid = $uuidString;

            $options = ['cost' => 12];
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

            try {
                createUser($uuid, $name, $email, $hashPassword);
                header('location: auth?action=signup&success=1&message=Vous êtes inscrit !');
            } catch (Exception $e) {
                throw new Exception("erreur lors de la creation d'utilisateur");
            }
        }

    }

    require_once './view/signup.php';
}

function login()
{
    session_start();
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        try {
            $user = getUserByMail($email);
        } catch (Exception $e) {
            throw new Exception("Paire email/mdp incorrecte");
        }

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_uuid'] = $user['uuid'];
                $_SESSION['user_name'] = $user['name'];
                header('location: index.php');
                exit();
            } else {
                header('location: auth?action=login&error=1&message=Paire email/mdp incorrecte');
                exit();
            }
        }
    }


    require_once './view/login.php';
}

function disconect()
{
    session_start();
    session_destroy();
    header('location: auth?action=login&success=1&message=Vous êtes désormais déconnecté !');
    exit();
}