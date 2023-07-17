<?php
session_start();
// Obtener el ID del usuario desde la consulta GET
if(isset($_POST['userId'])){
    $userId = $_POST['userId'];
}
// Obtener el valor de la acción desde la consulta GET
if(isset($_POST['action'])){
    $action = $_POST['action'];
}
$urlConnect = "../../vendor/connect.php";

require "../Model/notification.php";
require "../Model/DaoNofication.php";
require "../Model/project.php";
require "../Model/DaoProject.php";
require "../Model/project_assignments.php";
require "../Model/Daoproject__assignmets.php";
require "../Model/user.php";
require "../Model/DaoUser.php";

if ($action === 'RequestJoin') {

    $creator_id = $_POST['creator_id'];
    $nameProject = $_POST['nameProject'];
    
    $notification = new Notification();
    $notification->id = null;
    $notification->user_notificate = $creator_id;
    $notification->user_id = $userId;
    $notification->type = 0;
    $username=$_SESSION["user"]['name'];
    $notification->content = "Solicitud de ".$username." de entrar en el grupo ".$nameProject;

    $daoNotification = new DaoNotification("proyectmanager");

    if(!$daoNotification->hasNotification($notification->user_notificate,$userId)){

        $daoNotification->insert($notification);

        echo json_encode(array("sucess" => "OK"));
    }else{
        echo json_encode(array("sucess" => "Error"));

    }


}elseif($action === 'getAll'){

    $daoNotification = new DaoNotification("proyectmanager");
    $notifications = $daoNotification->getAll($_SESSION["user"]['id']);

    $notificationArray = array();
    foreach ($notifications as $notification) {
        $notificationData = array(
            'id' => $notification->id,
            'user_id'=>$notification->user_id,
            'user_notificate' =>$notification->user_notificate,
            'content' => $notification->user_id,
            'type' => $notification->type,
            'content' => $notification->content,

        );
        $notificationArray[] = $notificationData;
    }
    
    // Devolver las notas en formato JSON
    echo json_encode($notificationArray);
}elseif($action == "Accept"){
    $idUser = $_POST['idUser'];
    $idNotif = $_POST['idNotif'];
    $name = $_POST['name'];

    $daoAssignProject = new DaoAssignProject('proyectmanager');
    $daoProject = new DaoProject('proyectmanager');
    $project = $daoProject->getProjectByName($name);
    $assign = new Project_assignments();
    $assign->project_id = $project["id"];
    $assign->user_id = $idUser;

    $daoAssignProject->insert($assign);
    delNotification($idNotif);

    echo json_encode(array("sucess" => "OK"));

}elseif($action == "Reject"){
    $idUser = $_POST['idUser'];
    $idNotif = $_POST['idNotif'];
    $name = $_POST['name'];

    $daoAssignProject = new DaoAssignProject('proyectmanager');
    $daoProject = new DaoProject('proyectmanager');
    $project = $daoProject->getProjectByName($name);
    $assign = new Project_assignments();
    $assign->project_id = $project["id"];
    $assign->user_id = $idUser;

    delNotification($idNotif);

    echo json_encode(array("sucess" => "OK"));
}
    
    //$daoAssignProject 
else {
    // En caso de que se proporcione una acción no válida
    echo json_encode(array("error" => "Invalid action"));
}

function delNotification($idNotif) {
    
    $daoNotification = new DaoNotification('proyectmanager');
    $daoNotification->delete($idNotif);

}