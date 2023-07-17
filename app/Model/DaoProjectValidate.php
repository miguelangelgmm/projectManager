<?php 
require_once("../vendor/connect.php");
require_once("project.php");

class DaoProject extends DB {

    public $projects=array();   //Array de notas

    public function __construct($base) {
        $this->dbname = $base;
    }
    
    public function insert(Project $project) {
        $param = array(
            ":id" => $project->__get("id"),
            ":name" => $project->__get("name"),
            ":description" => $project->__get("description"),
            ":creator_id" => $project->__get("creator_id")
        );
        
        $consulta = "INSERT INTO project (id, name, description, creator_id) VALUES (:id, :name, :description, :creator_id)";
        
        $this->ConsultaSimple($consulta, $param);
    }
    public function getProjectUser($creator_id)
    {

        $param = array(
            ":creator_id" => $creator_id
        );
        $consulta = "SELECT * FROM project WHERE creator_id = :creator_id ORDER BY id DESC LIMIT 1";
        $this->projects = array();

        $this->ConsultaDatos($consulta, $param);

        return $this->filas[0];
    }

    public function getProjectById($id)
    {
        $param = array(
            ":id" => $id
        );
        $consulta = "SELECT * FROM project WHERE id = :id";
        $this->projects = array();
    
        $this->ConsultaDatos($consulta, $param);
    
        return $this->filas[0];
    }
    
    public function getProjectByName($name)
{
    $param = array(
        ":name" => $name
    );
    $consulta = "SELECT * FROM project WHERE name = :name";
    $this->projects = array();
        $this->ConsultaDatos($consulta, $param);
        if (count($this->filas) == 0) {
            return null;
        }
            return $this->filas[0];

}

    public function searchProject($name) {
        $param = array(":name" => $name);
        $this->projects = array();
        $consulta = "SELECT * FROM project WHERE name LIKE CONCAT('%', :name, '%') ORDER BY name LIMIT 10";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $project = new Project();
            $project->__set("id", $fila["id"]);
            $project->__set("name", $fila["name"]);
            $project->__set("description", $fila["description"]);
            $project->__set("creator_id", $fila["creator_id"]);
            $this->projects[] = $project;
        }
        return $this->projects;
    }
}

?>