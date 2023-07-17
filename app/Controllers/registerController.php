<?php

class RegisterController {
    
    public function index() {

        // Pasar los datos a la vista correspondiente
        require_once '../app/View/register.php';
        require_once '../app/View/layout/layout_user.php';
        echo '<script>newUserValidation();</script>';
        echo '<script>addTogglePasswordEvent("password", "eye");</script>';
        echo '<script>addTogglePasswordEvent("confirmPassword", "eye2");</script>';
    }
    
}
?>