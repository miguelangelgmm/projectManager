<?php

session_start();

if(isset($_POST['action'])){
    $action = $_POST['action'];
}

if ($action === 'close') {
    // Vaciar la sesión y destruir los datos asociados
    session_unset();
    session_destroy();

    // Eliminar la cookie 'userid'
    setcookie('userid', '', time() - 3600, '/');

    // Redirigir o mostrar un mensaje al usuario
    header("Location: ./public.php"); 
    exit;
}elseif($action == 'update'){
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        // La imagen se ha enviado correctamente
        $image = $_FILES['image'];
        $tempFilePath = $image['tmp_name'];

        $uploadDir = 'C:\xampp\htdocs\proyectoWeb3\public\img\\';
        $uploadPath = $uploadDir . $_SESSION['user']['name'] .".jpg";
        move_uploaded_file($tempFilePath, $uploadPath);
        $_SESSION['user']['image'] = $_SESSION['user']['name'] .".jpg";
        $urlConnect = "../../vendor/connect.php";
        require_once("../Model/user.php");
        require_once("../Model/DaoUser.php");

        $daoUser = new DaoUser("proyectmanager");
        $daoUser->UpdateImg($_SESSION["user"]["id"],$_SESSION['user']['name'] .".jpg");
    
        echo json_encode(array("sucess" => "OK"));

    } else {
        // Ocurrió un error al subir la imagen
        echo json_encode(array("sucess" => "Error"));
    }

}

?>