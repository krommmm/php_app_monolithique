<?php
function getUsers()
{
    $pdo = getConnexion();
    $req = 'SELECT * FROM user';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function createUser($uuid, $name, $email, $hashPassword)
{
    $pdo = getConnexion();
    $req = 'INSERT INTO user(uuid,name,email,password) VALUES(:uuid,:name,:email,:password)';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue('uuid', $uuid, PDO::PARAM_STR);
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->bindValue('password', $hashPassword, PDO::PARAM_STR);
    $stmt->execute();
}

function getUserByMail($email)
{
    $pdo = getConnexion();
    $req = 'SELECT * FROM user WHERE email = :email';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue('email',$email,PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}