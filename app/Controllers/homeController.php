<?php

class HomeController {
    
    public function index() {
        $data = [
            'title' => 'project manager'
        ];
        // Cargar la vista principal de la aplicación
        require_once '../app/View/home.php';
    }
    
    
}
?>