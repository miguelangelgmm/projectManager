<?php
require_once("../../vendor/connect.php");
require_once("notes.php");

class DaoNote extends DB {

    public $notes=array();   //Array de notas

    public function __construct($base) {
        $this->dbname = $base;
    }

    public function insert(Note $note) {
        $param = array(
            ":id" => $note->id,
            ":user_id" => $note->user_id,
            ":contenido" => $note->contenido,
            ":title" => $note->title,
        );
    
        $consulta = "INSERT INTO notes (id, user_id, title, contenido) VALUES (:id, :user_id, :title, :contenido)";
    
        $this->ConsultaSimple($consulta, $param);
    }

    public function getAll($user_id) {
        $param = array(":user_id" => $user_id);
        $this->notes = array();
        $consulta = "SELECT * FROM notes WHERE user_id = :user_id";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $note = new Note();
            $note->__set("id", $fila["id"]);
            $note->__set("user_id", $fila["user_id"]);
            $note->__set("contenido", $fila["contenido"]);
            $note->__set("title", $fila["title"]);
            $this->notes[] = $note;
        }
        return $this->notes;
    }

    public function delete($id) {
        $param = array(
            ":id" => $id,
        );
    
        $consulta = "DELETE FROM notes WHERE id = :id";
    
        $this->ConsultaSimple($consulta, $param);
    }

}

?>