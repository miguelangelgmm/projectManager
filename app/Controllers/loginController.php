<?php

class LoginController {
    
    public function index() {

        // Pasar los datos a la vista correspondiente
        require_once '../app/View/login.php';
        require_once '../app/View/layout/layout_user.php';
        echo '<script>loginValidation();</script>';
        echo '<script>addTogglePasswordEvent("password", "eye");</script>';
    }
    
}
?>