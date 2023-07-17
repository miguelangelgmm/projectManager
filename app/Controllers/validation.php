<?php

require_once("../Model/user.php");
require_once("../Model/DaoUser.php");

$select = $_GET['type'];

function verifyEmail($email)
{
    $daoUsuario = new DaoUser('proyectmanager');
    $exists = $daoUsuario->existeCorreoElectronico($email);
    return $exists;
}

function verifyUsername($username)
{
    $daoUsuario = new DaoUser('proyectmanager');
    $exists = $daoUsuario->existeNombreUsuario($username);
    return $exists;
}


if($select === "email"){
    $email = $_POST['email'];

    $emailExists =  verifyEmail($email);
    
    $response = array('exists' => $emailExists);
    
    //$response = array('exists' => true);
    header('Content-Type: application/json');
    echo json_encode($response);
}

if($select === "username"){
    $username = $_POST['username'];

    $usernameExists =  verifyUsername($username);
    
    $response = array('exists' => $usernameExists);
    
    //$response = array('exists' => true);
    header('Content-Type: application/json');
    echo json_encode($response);
}



?>

