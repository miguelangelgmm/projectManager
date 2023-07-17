<?php


// Obtener el valor de la acción desde la consulta GET
if(isset($_POST['action'])){
    $action = $_POST['action'];
}
$urlConnect = "../../vendor/connect.php";
require "../Model/project.php";
require "../Model/DaoProject.php";
require "../Model/project_assignments.php";
require "../Model/Daoproject__assignmets.php";
require "../Model/user.php";
require "../Model/DaoUser.php";
    // Verificar la acción solicitada
    if ($action === 'insert') {
        // Recoger los datos enviados por POST
        $name = $_POST['name'];
        $description = $_POST['description'];
        $userId = $_POST['userId'];
        if(strlen($name) > 40 || strlen($name) == 0 || strlen($description) > 600 || strlen($description) == 0){
            exit;
        }

        
        $project = new Project();
        $project->id = null;
        $project->creator_id = $userId;
        $project->name = $name;
        $project->description = $description;

        $daoProject = new DaoProject('proyectmanager');
        $daoProject->insert($project);

        $lastProject =$daoProject->getProjectUser($project->creator_id); 

        $daoAssignProject = new DaoAssignProject('proyectmanager');
        $assign = new Project_assignments();
        $assign->project_id = $lastProject["id"];
        $assign->user_id = $project->creator_id;

        $daoAssignProject->insert($assign);


        // Devolver una respuesta al cliente
        $response = array(
            'status' => 'success',
            'message' => 'Nota insertada correctamente'
        );
        echo json_encode($response);
    }
    elseif($action == "load"){
        loadProject();

    }
    elseif($action =="search"){
        
        $name = $_POST['name'];

        $daoProject = new DaoProject('proyectmanager');
        $projectsSearch = $daoProject->searchProject($name);
        $daoAssignProject = new DaoAssignProject('proyectmanager');
        $userDao = new DaoUser("proyectmanager");

        $projectsUser =array();
        foreach ($projectsSearch as $key => $value) {
            $projectsUser[] = $daoAssignProject->getFiveUsers($value->id);
        }

        $result = array();
        foreach ($projectsUser as $key => $value) {
            $fila = array();
            $id_project = $value[0]->__get("project_id"); // Obtener el valor de project_id 
            $fila[] = $daoProject->getProjectById($id_project);
            $users = array();
            foreach ($value as $assign) {
                $user_id = $assign->__get("user_id"); // Obtener el valor de user_id 
                $user= $userDao->GetById($user_id); //pasar a array

                $user_data = array(
                    "id" => $user->__get("id"),
                    "name" => $user->__get("name"),
                    "image" => $user->__get("image"),
                );
        
                $fila[] = $user_data; // Agregar el arreglo de datos del usuario a $fila
            }
        
            $result[] = $fila;
        }

        echo json_encode($result);

    }elseif($action =="getProjectByName"){

        $name = $_POST['name'];
        $daoAssignProject = new DaoAssignProject('proyectmanager');
        $daoProject = new DaoProject('proyectmanager');
        $userDao = new DaoUser("proyectmanager");

        $project = $daoProject->getProjectByName($name);

        if($project == null){
            echo json_encode(null);

        }else{
            $result = array();
            $result[] = $project;

            $usersId = $daoAssignProject->getFiveUsers($project["id"]);
            
            foreach ($usersId as $value) {

                $user_id = $value->__get("user_id"); // Obtener el valor de user_id 
                $user= $userDao->GetById($user_id); //pasar a array

                $user_data = array(
                    "id" => $user->__get("id"),
                    "name" => $user->__get("name"),
                    "image" => $user->__get("image"),
                );
                $result[] = $user_data;
            }

            echo json_encode($result);

        }
    }
    else {
        // En caso de que se proporcione una acción no válida
        echo json_encode(array("error" => "Invalid action"));
    }


    function loadProject()
    {
        $userId = $_POST['userId'];

        $daoAssignProject = new DaoAssignProject('proyectmanager');
        $daoProject = new DaoProject('proyectmanager');
        $userDao = new DaoUser("proyectmanager");
        $projectsAssign = $daoAssignProject->getAllProjectUser($userId);
        $projectsUser =array();
        foreach ($projectsAssign as $key => $value) {
            $projectsUser[] = $daoAssignProject->getFiveUsers($value->project_id);
        }

        $result = array();
        foreach ($projectsUser as $key => $value) {
            $fila = array();
            $id_project = $value[0]->__get("project_id"); // Obtener el valor de project_id 
            $fila[] = $daoProject->getProjectById($id_project);
            $users = array();
            foreach ($value as $assign) {
                $user_id = $assign->__get("user_id"); // Obtener el valor de user_id 
                $user= $userDao->GetById($user_id); //pasar a array

                $user_data = array(
                    "id" => $user->__get("id"),
                    "name" => $user->__get("name"),
                    "image" => $user->__get("image"),
                    // Agrega otras propiedades del usuario si las necesitas
                );
        
                $fila[] = $user_data; // Agregar el arreglo de datos del usuario a $fila
            }
        
            $result[] = $fila;
        }

        echo json_encode($result);

    }
?>

