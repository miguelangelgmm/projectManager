<?php 

require_once("../../vendor/connect.php");
require_once("project_assignments.php");

class DaoAssignProject extends DB {

    public $assigns=array();   //Array de notas

    public function __construct($base) {
        $this->dbname = $base;
    }
    
    public function insert(Project_assignments $project) {
        $param = array(
            ":project_id" => $project->__get("project_id"),
            ":user_id" => $project->__get("user_id")
        );
        
        $consulta = "INSERT INTO project_assignments (project_id,user_id) VALUES (:project_id, :user_id)";
        
        $this->ConsultaSimple($consulta, $param);
    }

    public function getFiveUsers($project_id) {
        $param = array(":project_id" => $project_id);
        $this->assigns = array();
        $consulta = "SELECT * FROM project_assignments WHERE project_id = :project_id Limit 5";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $assign = new Project_assignments();
            $assign->__set("project_id", $fila["project_id"]);
            $assign->__set("user_id", $fila["user_id"]);
            
            $this->assigns[] = $assign;
        }
        return $this->assigns;
    }

    public function getAllProjectUser($userId) {
        $param = array(":user_id" => $userId);
        $this->assigns = array();
        $consulta = "SELECT * FROM project_assignments WHERE user_id = :user_id";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $assign = new Project_assignments();
            $assign->__set("project_id", $fila["project_id"]);
            $assign->__set("user_id", $fila["user_id"]);
            
            $this->assigns[] = $assign;
        }
        return $this->assigns;
    }

    public function getAllUsers($project_id) {
        $param = array(":project_id" => $project_id);
        $this->assigns = array();
        $consulta = "SELECT * FROM project_assignments WHERE project_id = :project_id";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $assign = new Project_assignments();
            $assign->__set("project_id", $fila["project_id"]);
            $assign->__set("user_id", $fila["user_id"]);
    
            $this->assigns[] = $assign;
        }
        return $this->assigns;
    }
}

?>