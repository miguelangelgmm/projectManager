<?php

    require "../Model/calendar.php";
    require "../Model/DaoCalendar.php";

    // Obtener el ID del usuario desde los datos POST
    if(isset($_POST['userId'])){
        $userId = $_POST['userId'];
    }
    // Obtener el valor de la acción desde los datos POST
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    if(isset($_POST['content'])){
        $content = $_POST['content'];
    }
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }
    if(isset($_POST['status'])){
        $status = $_POST['status'];
    }
    // Verificar la acción solicitada
if ($action === 'insert') {

    $daoCalendar = new DaoCalendar('proyectmanager');
    $calendar = new Calendar();
    $calendar->id = null;
    $calendar->user_id = $userId;
    $calendar->content = $content;
    $calendar->date = $date;
    $calendar->type = $status; 

    if($status == "information"){
        $calendar->type = 0; 
    }elseif($status == "completed"){
        $calendar->type = 1; 
    }else{
        $calendar->type = 2; 
    }

    if($content<600){
        $eventos = $daoCalendar->insert($calendar);
    }
}elseif($action === 'list'){
    $daoCalendar = new DaoCalendar('proyectmanager');
    $events = $daoCalendar->getAll($userId);

    $eventsArray = array();
    foreach ($events as $event) {
        $eventData = array(
            'date' => $event->date,
            'type' => $event->type,
            'content' => $event->content,
        );
        $eventsArray[] = $eventData;
    }
    
    // Devolver los eventos en formato JSON
    echo json_encode($eventsArray);

}
?>
