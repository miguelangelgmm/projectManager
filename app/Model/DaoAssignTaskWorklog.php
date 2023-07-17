<?php
require_once("../../vendor/connect.php");

class DaoAssignTask extends DB {

    public $notes=array();   //Array de dias

    public function __construct($base) {
        $this->dbname = $base;
    }
    public function insert($task_id, $user_names) {
        $consulta = "INSERT INTO tasks_assignments (task_id, user_id) VALUES ";
        $param = array();
    
        $valueStrings = array();
        foreach ($user_names as $user_name) {
            // Consulta para obtener el ID del usuario por su nombre
            $consultaUser = "SELECT id FROM user WHERE name = :user_name";
            $paramUser = array(":user_name" => $user_name);
            $this->ConsultaDatos($consultaUser, $paramUser);
            $resultados = $this->filas;
    
            if (count($resultados) > 0) {
                $user_id = $resultados[0]['id'];
    
                $valueStrings[] = "(:task_id, :user_id_" . $user_id . ")";
                $param[":user_id_" . $user_id] = $user_id;
            }
        }
    
        $consulta .= implode(", ", $valueStrings);
    
        $param[":task_id"] = $task_id;
    
        $this->ConsultaSimple($consulta, $param);
    }

    public function getAllUsersByTask($project_id,$task_id) {
        $param = array(":project_id" => $project_id, ":task_id" => $task_id);
        $users = array();
        
        $consulta = "SELECT u.*, t.id AS task_id
        FROM user u
        INNER JOIN tasks_assignments ta ON u.id = ta.user_id
        INNER JOIN task t ON ta.task_id = t.id
        WHERE t.project_id = :project_id AND t.id = :task_id";
        
        $this->ConsultaDatos($consulta, $param);
        
        foreach ($this->filas as $fila) {
            $user = array(
                "id" => $fila["id"],
                "name" => $fila["name"],
                "image" => $fila["image"],
            );
            $users[] = $user;
        }
        
        return $users;
    }
    
}

?>