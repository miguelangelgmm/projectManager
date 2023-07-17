<?php 

require_once("../vendor/connect.php");
require_once("project_assignments.php");

class DaoAssignProjectValidate extends DB {

    public $assigns=array();   //Array de notas

    public function __construct($base) {
        $this->dbname = $base;
    }
    

    public function exist($projectid, $userid)
    {
        $param = array(
            ":project_id" => $projectid,
            ":user_id" => $userid
        );
        $consulta = "SELECT COUNT(*) as count FROM project_assignments WHERE project_id = :project_id AND user_id = :user_id";
        $this->ConsultaDatos($consulta, $param);
    
        // Obtener el valor de count desde la consulta
        $count = $this->filas[0]['count'];

        // Retornar true si count es mayor que 0, false en caso contrario
        return ($count > 0) ? true : false;
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