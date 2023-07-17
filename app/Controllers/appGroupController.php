<?php

class AppGroupController {
    
    public function home($group) {
        require_once "../app/Model/user.php";
        require_once "../app/Model/DaoUserValidate.php";
        require_once "../app/Model/DaoProjectValidate.php";
        require_once "../app/Model/Daoproject__assignmetsValidate.php";
        require_once '../app/Model/task.php';
        require_once '../app/Model/DaoTask.php';
        require_once '../app/Model/DaoAssignTask.php';
        session_start();

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user'])) {
            // El usuario no está autenticado, redirigir a la página principal
            header("Location: ../../public");
            exit();
        }
        $daoProject = new DaoProject("proyectmanager");
        $project = $daoProject->getProjectByName($group);
       // echo $project;
        //si el grupo no existe
        if (!$project) {
            // El usuario no está autenticado, redirigir a la página principal
            header("Location: ../../public");
            exit();
        }
        
        // Verificar que el usuario esta en el grupo 
        if (!isset($_SESSION['user'])) {
            // El usuario no está autenticado, redirigir a la página principal
            header("Location: ../../public");
            exit();
        }
        $idProject = $project["id"];

        $daoAssign = new DaoAssignProjectValidate("proyectmanager");
        $exist= $daoAssign->exist($idProject,$_SESSION['user']['id']);
        if (!$exist) {
            // El usuario no está autenticado, redirigir a la página principal
            header("Location: ../public");
            exit();
        }

        // Obtener el nombre de usuario de la sesión
        $username = $_SESSION['user']['name'];
        // Concatenar el nombre de usuario al título
        $title = 'project manager - ' . $username;

        //comprobar si el usuario es el creador del grupo (Administrador)
        $typeUser = "normal";
        if($project["creator_id"] == $_SESSION['user']['id']){
            $typeUser = "admin";
        }
        $usersAssign =  $daoAssign->getAllUsers($idProject);
        $users = array();
                
        if(count($usersAssign)>0){
            $daoUser = new DaoUser("proyectmanager");
            foreach ($usersAssign as $key => $value) {
                $user_id = $value->user_id;
                $user=  $daoUser->GetById($user_id);
                $users[] = array("id" => $user_id, "name" => $user->name);
            }
        }

        $_SESSION["proyect"]["id"] = $idProject;
        //si estamos editando una tarea
        if(isset($_POST["hiddenTaskEditId"])){
            $titleNewTask = $_POST['titleNewTask'];
            $description = $_POST['descripcionNewTask'];
            $hiddenTask = $_POST['hiddenTaskEdit'];
            $hiddenPerson = $_POST['hiddenPersonEdit'];
            $initDate = $_POST['initDate'];
            $endDate = $_POST['endDate'];
            $errors = [];
            $hiddenTaskEditId = $_POST['hiddenTaskEditId'];

            $daoTask = new DaoTask("proyectmanager");

            $daoTask->delete($hiddenTaskEditId);

            // Validar título de la tarea
            if(empty($titleNewTask)){
                $errors[] = "El título de la tarea es obligatorio";
            } elseif(strlen($titleNewTask) > 40){
                $errors[] = "El título de la tarea debe tener máximo 40 caracteres";
            }
        
            // Validar descripción de la tarea
            if(empty($description)){
                $errors[] = "La descripción de la tarea es obligatoria";
            } elseif(strlen($description) > 600){
                $errors[] = "La descripción de la tarea debe tener máximo 600 caracteres";
            }
        
            // Validar subtareas
            $subtasks = explode(",", $hiddenTask);
            foreach($subtasks as $subtask){
                if(empty($subtask)){
                    $errors[] = "Las subtareas no pueden estar vacías";
                    break;
                }
            }
        
            // Validar personas asociadas
            $persons = explode(",", $hiddenPerson);
            foreach($persons as $person){
                if(empty($person)){
                    $errors[] = "Las personas asociadas no pueden estar vacías";
                    break;
                }
            }
        
            // Validar fechas
            if(empty($initDate)){
                $errors[] = "La fecha de inicio es obligatoria";
            }
            if(empty($endDate)){
                $errors[] = "La fecha de finalización es obligatoria";
            }
        
            // Si no hay errores, continuar la ejecución
            if(empty($errors)){


                $task = new Task();
                $task->id = null;
                $task->project_id = $idProject;
                $task->name = $titleNewTask;
                $task->description = $description;
                $task->start_date = $initDate;
                $task->end_date = $endDate;
                $task->state = 0;
                $task->subtasks = $hiddenTask;

                $daoTask->insert($task);
                //obtenemos la ultima tarea insertada para un proyecto
                $taskInsert = $daoTask->getLastInsertedTask($idProject);

                $daoAssignTask = new DaoAssignTask("proyectmanager");
                $daoAssignTask->insert($taskInsert->id, $persons);

            }
        }

        //añadimos una nueva tarea si se ha solicitado
        elseif(isset($_POST["titleNewTask"])){
            $titleNewTask = $_POST['titleNewTask'];
            $description = $_POST['descripcionNewTask'];
            $hiddenTask = $_POST['hiddenTask'];
            $hiddenPerson = $_POST['hiddenPerson'];
            $initDate = $_POST['initDate'];
            $endDate = $_POST['endDate'];
            $errors = [];

            // Validar título de la tarea
            if(empty($titleNewTask)){
                $errors[] = "El título de la tarea es obligatorio";
            } elseif(strlen($titleNewTask) > 40){
                $errors[] = "El título de la tarea debe tener máximo 40 caracteres";
            }
        
            // Validar descripción de la tarea
            if(empty($description)){
                $errors[] = "La descripción de la tarea es obligatoria";
            } elseif(strlen($description) > 600){
                $errors[] = "La descripción de la tarea debe tener máximo 600 caracteres";
            }
        
            // Validar subtareas
            $subtasks = explode(",", $hiddenTask);
            foreach($subtasks as $subtask){
                if(empty($subtask)){
                    $errors[] = "Las subtareas no pueden estar vacías";
                    break;
                }
            }
        
            // Validar personas asociadas
            $persons = explode(",", $hiddenPerson);
            foreach($persons as $person){
                if(empty($person)){
                    $errors[] = "Las personas asociadas no pueden estar vacías";
                    break;
                }
            }
        
            // Validar fechas
            if(empty($initDate)){
                $errors[] = "La fecha de inicio es obligatoria";
            }
            if(empty($endDate)){
                $errors[] = "La fecha de finalización es obligatoria";
            }
        
            // Si no hay errores, continuar la ejecución
            if(empty($errors)){


                $task = new Task();
                $task->id = null;
                $task->project_id = $idProject;
                $task->name = $titleNewTask;
                $task->description = $description;
                $task->start_date = $initDate;
                $task->end_date = $endDate;
                $task->state = 0;
                $task->subtasks = $hiddenTask;

                $daoTask = new DaoTask("proyectmanager");
                $daoTask->insert($task);
                //obtenemos la ultima tarea insertada para un proyecto
                $taskInsert = $daoTask->getLastInsertedTask($idProject);

                $daoAssignTask = new DaoAssignTask("proyectmanager");
                $daoAssignTask->insert($taskInsert->id, $persons);

            }
            
        }
        $daoTask = new DaoTask("proyectmanager");
        $tasksProject = $daoTask->getAllbyProject($idProject);

        $user_assign = array();
        if(count($tasksProject)>0){
            $daoAssignTask = new DaoAssignTask("proyectmanager");
            $user_assign = $daoAssignTask->getAllUsersByProject($idProject);
        }

        $data = [
            'title' => $title,
            'id'=>$_SESSION['user']['id'],
            'name'=>$_SESSION['user']['name'],
            'image'=>$_SESSION['user']['image'],
            'idProject'=>$idProject,
            'typeUser'=>$typeUser,
            'users' => $users,
            "taskProject"=>$tasksProject,
            "user_assign"=>$user_assign
        ];
        // Cargar la vista de la página principal de la aplicación
        require_once '../app/View/appWork.php';
    }

    
}
?>