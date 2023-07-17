<?php
require_once("../../vendor/connect.php");
require_once("notification.php");

class DaoNotification extends DB {

    public $notifications=array();   //Array de dias

    public function __construct($base) {
        $this->dbname = $base;
    }

    public function insert(Notification $notification) {
        $param = array(
            ":id" => $notification->id,
            ":user_notificate" => $notification->user_notificate,
            ":user_id" => $notification->user_id,
            ":type" => $notification->type,
            ":content" => $notification->content,
        );
    
        $consulta = "INSERT INTO notifications (id, user_notificate, user_id, type, content) VALUES (:id, :user_notificate, :user_id, :type, :content)";
    
        $this->ConsultaSimple($consulta, $param);
    }

    public function getAll($userNotificate) {
        $param = array(":userNotificate" => $userNotificate);
        $this->notifications = array();
        $consulta = "SELECT * FROM notifications WHERE user_notificate = :userNotificate";
        $this->ConsultaDatos($consulta, $param);
        foreach ($this->filas as $fila) {
            $notification = new Notification();
            $notification->__set("id", $fila["id"]);
            $notification->__set("user_notificate", $fila["user_notificate"]);
            $notification->__set("user_id", $fila["user_id"]);
            $notification->__set("type", $fila["type"]);
            $notification->__set("content", $fila["content"]);
            $this->notifications[] = $notification;
        }
        return $this->notifications;
    }
    public function hasNotification($user_notificate, $user_id) {
    $param = array(
        ":user_notificate" => $user_notificate,
        ":user_id" => $user_id
    );
    
    $consulta = "SELECT COUNT(*) AS count FROM notifications WHERE user_notificate = :user_notificate AND user_id = :user_id";
    
    $this->ConsultaDatos($consulta, $param);
    
    return $this->filas[0]["count"] > 0;
}
public function delete($notificationId) {
    $param = array(":notificationId" => $notificationId);
    
    $consulta = "DELETE FROM notifications WHERE id = :notificationId";
    
    $this->ConsultaSimple($consulta, $param);
}
}

?>