<?php
require_once("../../vendor/connect.php");
require_once("calendar.php");

class DaoCalendar extends DB {

    public $notes=array();   //Array de dias

    public function __construct($base) {
        $this->dbname = $base;
    }

    public function insert(Calendar $calendar) {
        $param = array(
            ":id" => $calendar->id,
            ":user_id" => $calendar->user_id,
            ":date" => $calendar->date,
            ":type" => $calendar->type,
            ":content" => $calendar->content,
        );
    
        $consulta = "INSERT INTO calendar (id, user_id, date, type, content) VALUES (:id, :user_id, :date, :type, :content)";
    
        $this->ConsultaSimple($consulta, $param);
    }

    public function getAll($user_id) {
        $param = array(":user_id" => $user_id);
        $this->notes = array();
        $consulta = "SELECT * FROM calendar WHERE user_id = :user_id";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $day = new Calendar();
            $day->__set("id", $fila["id"]);
            $day->__set("user_id", $fila["user_id"]);
            $day->__set("date", $fila["date"]);
            $day->__set("content", $fila["content"]);
            $day->__set("type", $fila["type"]);
            $this->notes[] = $day;
        }
        return $this->notes;
    }
}

?>