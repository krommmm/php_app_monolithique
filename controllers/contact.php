<?php


function contact($action)
{
    switch ($action) {
        case 'visit':
            visit();
            break;

        case 'email':
            contactMail();
            break;

        default:
            throw new Exception('page inconnue');
    }
}

function visit()
{

    require_once 'view/contact.php';
}

function contactMail(){
    if (
        isset($_GET['name']) && !empty($_GET['name']) &&
        isset($_GET['prenom']) && !empty($_GET['prenom']) &&
        isset($_GET['email']) && !empty($_GET['email']) &&
        isset($_GET['message']) && !empty($_GET['message'])
     ) {


        $nom = htmlspecialchars($_GET['name']);
        $prenom = htmlspecialchars($_GET['prenom']);
        $email = htmlspecialchars($_GET['email']);
        $message = htmlspecialchars($_GET['message']);

        $destinataire = "test@test.fr";
        $sujet = "Terrain des hauts de saint benoit";
        $headers = "From: test@test.fr";
        mail($destinataire, $sujet, $message, $headers);

        header("location: contact?action=visit&success=1&message=Email envoyé");


     } else {

        header("location: contact?action=visit&error=1&message=Problème lors de l'envoie de l'email");

     }
}

