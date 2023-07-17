<?php
require_once("../../vendor/connect.php");
require_once("task.php");

class DaoTask extends DB {

    public $tasks=array();   //Array de tareas

    public function __construct($base) {
        $this->dbname = $base;
    }

    public function insert(Task $task) {
        $param = array(
            ":id"=>$task->id,
            ":project_id" => $task->project_id,
            ":name" => $task->name,
            ":description" => $task->description,
            ":start_date" => $task->start_date,
            ":end_date" => $task->end_date,
            ":state" => $task->state,
            ":subtasks" => $task->subtasks
        );
    
        $consulta = "INSERT INTO task (id, project_id, name, description , start_date, end_date, state, subtasks) VALUES (:id, :project_id, :name, :description, :start_date, :end_date, :state, :subtasks)";    
        $this->ConsultaSimple($consulta, $param);
    }

    public function getLastInsertedTask($projectId) {
        $param = array(":project_id" => $projectId);
        $consulta = "SELECT * FROM task WHERE project_id = :project_id ORDER BY id DESC LIMIT 1";
    
        $this->ConsultaDatos($consulta, $param);
        $resultados = $this->filas;
    
        if (count($resultados) > 0) {
            $task = new Task();
            $task->id = $resultados[0]['id'];
            $task->project_id = $resultados[0]['project_id'];
            $task->name = $resultados[0]['name'];
            $task->description = $resultados[0]['description'];
            $task->start_date = $resultados[0]['start_date'];
            $task->end_date = $resultados[0]['end_date'];
            $task->__set("state", $resultados[0]["state"]);
            $task->__set("subtasks", $resultados[0]["subtasks"]);
    
            return $task;
        }
    
        return null;
    }
    public function update(Task $task) {
        $param = array(
            ":id" => $task->id,
            ":project_id" => $task->project_id,
            ":name" => $task->name,
            ":description" => $task->description,
            ":assigned_to" => $task->assigned_to,
            ":start_date" => $task->start_date,
            ":end_date" => $task->end_date
        );

        $consulta = "UPDATE task SET project_id = :project_id, name = :name, description = :description, assigned_to = :assigned_to, start_date = :start_date, end_date = :end_date WHERE id = :id";

        $this->ConsultaSimple($consulta, $param);
    }

    public function delete($taskId) {
        $param = array(":id" => $taskId);
        $consulta = "DELETE FROM task WHERE id = :id";

        $this->ConsultaSimple($consulta, $param);
    }

    public function updateStateToDevelop($taskId) {
        $param = array(":id" => $taskId);
        $consulta = "UPDATE task SET state = 1 WHERE id = :id";
    
        $this->ConsultaSimple($consulta, $param);
    }
    public function updateStateToEnd($taskId) {
        $param = array(":id" => $taskId);
        $consulta = "UPDATE task SET state = 2 WHERE id = :id";
    
        $this->ConsultaSimple($consulta, $param);
    }
    public function getById($taskId) {
        $param = array(":id" => $taskId);
        $consulta = "SELECT * FROM task WHERE id = :id";

        $this->ConsultaDatos($consulta, $param);
        $resultados = $this->filas;

        if (count($resultados) > 0) {
            $task = array();
            $task["id"] = $resultados[0]['id'];
            $task["project_id"] = $resultados[0]['project_id'];
            $task["name"] = $resultados[0]['name'];
            $task["description"] = $resultados[0]['description'];
            $task["start_date"] = $resultados[0]['start_date'];
            $task["end_date"] = $resultados[0]['end_date'];
            $task["state"] = $resultados[0]["state"];
            $task["subtasks"] = $resultados[0]["subtasks"];


            return $task;
        }

        return null;
    }

    public function getAll() {
        $param = array();
        $this->tasks = array();
        $consulta = "SELECT * FROM tasks";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $task = new Task();
            $task->__set("id", $fila["id"]);
            $task->__set("project_id", $fila["project_id"]);
            $task->__set("name", $fila["name"]);
            $task->__set("description", $fila["description"]);
            $task->__set("start_date", $fila["start_date"]);
            $task->__set("end_date", $fila["end_date"]);
            $task->__set("state", $fila["state"]);
            $task->__set("subtasks", $fila["subtasks"]);

            $this->tasks[] = $task;
        }
        return $this->tasks;
    }

    public function getAllbyProject($project_id) {
        $param = array(":project_id" => $project_id);
        $this->tasks = array();
        $consulta = "SELECT * FROM task WHERE project_id = :project_id";
        $this->ConsultaDatos($consulta, $param);
        
        foreach ($this->filas as $fila) {
            $task = new Task();
            $task->__set("id", $fila["id"]);
            $task->__set("project_id", $fila["project_id"]);
            $task->__set("name", $fila["name"]);
            $task->__set("description", $fila["description"]);
            $task->__set("start_date", $fila["start_date"]);
            $task->__set("end_date", $fila["end_date"]);
            $task->__set("state", $fila["state"]);
            $task->__set("subtasks", $fila["subtasks"]);
    
            $this->tasks[] = $task;
        }
        
        return $this->tasks;
    }



}

?>