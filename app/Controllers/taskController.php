<?php

session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

require "../Model/project_assignments.php";
require "../Model/Daoproject__assignmets.php";
require "../Model/DaoAssignTaskWorklog.php";
require "../Model/DaoTaskValidate.php";
require "../Model/DaoProject.php";

if ($action == "getAllUser") {
    $daoAssignProject = new DaoAssignProject('proyectmanager');
    // $daoAssignProject->getAllProjectUser()
} elseif ($action == "modal0") {
    $projectId = $_POST['id'];
    $taskId = $_POST['idTask'];

    $daoAssignProject = new DaoAssignTask("proyectmanager");
    //obtenemos todos los usuarios asignados a la tarea
    $data[] = $daoAssignProject->getAllUsersByTask($projectId,$taskId);

    $daoTask = new DaoTask('proyectmanager');
    $data[] = $daoTask->getById($taskId);
    echo json_encode($data);

}elseif ($action == "develop") {
    $taskId = $_POST['id'];

    $daoTask = new DaoTask('proyectmanager');
    $daoTask->updateStateToDevelop($taskId);
    echo json_encode(array("sucess" => "OK"));

}elseif($action == "delete"){
    $taskId = $_POST['id'];

    $daoTask = new DaoTask('proyectmanager');
    $task = $daoTask->getById($taskId);

    $daoProject = new DaoProject('proyectmanager');
    $projectId = $daoProject->getProjectById($task["project_id"]);

    if($_SESSION['user']['id'] == $projectId["creator_id"]){

        $daoTask->delete($taskId);

        echo json_encode(array("sucess" => "OK"));
    }else{
        //solo el admin puede eliminar
        echo json_encode(array("sucess" => "error"));
    }


}elseif($action == "endTask"){
    $taskId = $_POST['id'];

    $daoTask = new DaoTask('proyectmanager');
    $daoTask->updateStateToEnd($taskId);
    echo json_encode(array("sucess" => "OK"));

    
}elseif($action == "update"){
    $projectId =$_SESSION["proyect"]["id"];
    $taskId = $_POST['idTask'];

    $daoAssignProject = new DaoAssignTask("proyectmanager");
    //obtenemos todos los usuarios asignados a la tarea
    $data[] = $daoAssignProject->getAllUsersByTask($projectId,$taskId);

    $daoTask = new DaoTask('proyectmanager');
    $data[] = $daoTask->getById($taskId);
    echo json_encode($data);

}
