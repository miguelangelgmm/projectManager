<?php

// Obtener el ID del usuario desde la consulta GET
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
}
// Obtener el valor de la acción desde la consulta GET
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
require "../Model/notes.php";
require "../Model/DaoNote.php";

    // Verificar la acción solicitada
    if ($action === 'obtenerNotas') {

        $daoNotes = new DaoNote('proyectmanager');
        $notes = $daoNotes->getAll($userId);

        $notesArray = array();
        foreach ($notes as $note) {
            $noteData = array(
                'id' => $note->id,
                'user_id'=>$note->user_id,
                'content' => $note->contenido,
                'title' => $note->title,

            );
            $notesArray[] = $noteData;
        }
        
        // Devolver las notas en formato JSON
        echo json_encode($notesArray);


    }
    
    elseif($action === 'insertNote'){
        // Recoger los datos enviados por POST
        $noteTitle = $_POST['title'];
        $noteContent = $_POST['content'];
        $userId = $_POST['userId'];
        if(strlen($noteTitle) > 40 || strlen($noteTitle) == 0 || strlen($noteContent) > 600 || strlen($noteContent) == 0){
            exit;
        }

        
        $note = new Note();
        $note->id = null;
        $note->user_id = $userId;
        $note->contenido = $noteContent;
        $note->title = $noteTitle;

        $daoNotes = new DaoNote('proyectmanager');
        $daoNotes->insert($note);

        // Devolver una respuesta al cliente
        $response = array(
            'status' => 'success',
            'message' => 'Nota insertada correctamente'
        );
        echo json_encode($response);
    }elseif($action === 'delete'){

        $id = $_GET['id'];
        $daoNotes = new DaoNote('proyectmanager');
        $daoNotes->delete($id);

    }
    else {
        // En caso de que se proporcione una acción no válida
        echo json_encode(array("error" => "Invalid action"));
    }

?>

