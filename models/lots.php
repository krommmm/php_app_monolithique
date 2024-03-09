<?php
require_once 'models/utils.php';
function getLots()
{
    $pdo = getConnexion();
    $req = 'SELECT * FROM lot ORDER BY id';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $lots = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $lots;
}

function getLotById($id)
{
    $pdo = getConnexion();
    $req = 'SELECT * FROM lot WHERE uuid = :uuid';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue('uuid', $id, PDO::PARAM_STR);
    $stmt->execute();
    $lot = $stmt->fetch(PDO::FETCH_ASSOC);
    return $lot;
}

function updateLot($setValues, $params)
{
    $pdo = getConnexion();
    $req = "UPDATE lot SET $setValues WHERE uuid = :uuid";
    $stmt = $pdo->prepare($req);
    $stmt->execute($params);
}

function insertLot($setKeys, $setValues, $params)
{
    $pdo = getConnexion();
    $req = "INSERT INTO lot($setKeys) VALUES($setValues)";
    $stmt = $pdo->prepare($req);
    $stmt->execute($params);
}

function deleteLot($id)
{
    $pdo = getConnexion();
    $req = 'DELETE FROM lot WHERE uuid = :uuid';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue('uuid', $id, PDO::PARAM_STR);
    $stmt->execute();
}

function saveImageFile($imageFile)
{
    //DISSECTION FILE
    $tmpName = $imageFile['tmp_name'];
    $name = $imageFile['name'];
    $size = $imageFile['size'];
    $error = $imageFile['error'];

    //RECUPERATION EXTENTION
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    //EXTENTIONS ACCEPTED
    $extensions = ['jpg', 'png', 'jpeg', 'webp'];

    //CHECK TAILLE
    $maxSize = 1000000; // = 1mb mais 400000 c'est mieux (penser à compresser les images)

    //date en millisecond (comme Date.now() en js) 
    $timestamp = round(microtime(true) * 1000);

    //RENAME FILE
    $newName = str_replace(".jpg", "", $name);
    $newName = str_replace(".jpeg", "", $newName);
    $newName = str_replace(".png", "", $newName);
    $newName = str_replace(".webp", "", $newName);
    $newName = str_replace(" ", "_", $newName);
    $nouveauNomImage = $newName . $timestamp . "." . $extension;

    if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
        move_uploaded_file($tmpName, './public/assets/pictures/lots/' . $nouveauNomImage);
        return $nouveauNomImage;
    } else {
        header("location: home");
    }
}