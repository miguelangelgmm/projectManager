<?php

class AppController {
    
    public function home() {
        require_once "../app/Model/user.php";
        require_once "../app/Model/DaoTask.php";
        require_once "../app/Model/DaoUserValidate.php";
        session_start();

        if(isset($_COOKIE['userid_cookie'])){
            $userDao = new DaoUser('proyectmanager');
            $user = $userDao->GetById($_COOKIE['userid_cookie']);
            $_SESSION['user']['id'] = $user->id;
            $_SESSION['user']['name'] = $user->name;
            $_SESSION['user']['image'] = $user->image;
        }

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user'])) {
            // El usuario no está autenticado, redirigir a la página principal
            header("Location: ../public");
            exit();
        }
        // Obtener el nombre de usuario de la sesión
        $username = $_SESSION['user']['name'];
        // Concatenar el nombre de usuario al título
        $title = 'project manager - ' . $username;

        $daoTask = new DaoTask('proyectmanager');
        $tasks = $daoTask->getFiveTasks($_SESSION['user']['id']);

        $data = [
            'title' => $title,
            'name'=>$_SESSION['user']['name'],
            'image'=>$_SESSION['user']['image'],
            'tasks'=>$tasks,
            'id'=>$_SESSION['user']['id']
        ];

        // Cargar la vista de la página principal de la aplicación
        require_once '../app/View/app.php';
    }
    
    public function task() {
        // Cargar la vista de la página de tareas de la aplicación
        require_once '../app/View/app.php';
    }
    
}
?>