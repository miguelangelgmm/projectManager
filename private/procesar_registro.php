
<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../app/Model/user.php";
    require "../app/Model/DaoUser.php";

    // Obtener los valores del formulario
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];
    
    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //creo un nuevo usuario
    $user = new User();
    $user->id = null;
    $user->name = $username;
    $user->password = $hashedPassword;
    $user->email = $email;
    $user->image = "default.png";
    //creo el dao User
    $daoUser = new daoUser('proyectmanager');

    // Realizar las validaciones
    $errors = [];

    // Validar el nombre de usuario
    if (strlen($user->name) < 4 || strlen($user->name) > 16) {
        $errors[] = "El nombre de usuario es obligatorio y debe tener entre 4 y 16 caracteres.";
    }

    // Validar la contraseña
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "La contraseña debe tener al menos una letra mayúscula, un dígito, un carácter especial (@$!%*?&), y una longitud de al menos 8 caracteres.";
    }

    // Validar la confirmación de la contraseña
    if ($password !== $confirmPassword) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    // Validar el correo electrónico
    if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico debe ser válido.";
    }

    if ($daoUser->existeNombreUsuario($user->name)) {
        $errors[] = "El nombre de usuario ya existe.";
    }

    if ($daoUser->existeCorreoElectronico($user->email)) {
        $errors[] = "El correo electrónico ya existe.";
    }

    // Verificar si hay errores
    if (!empty($errors)) {
        // Mostrar los mensajes de error
        $errorMessage = implode(",", $errors);

        sendRegisterError($errorMessage);
        
    } else {
        // Realizar las acciones correspondientes al registro exitoso
        //insertamos el usuario
        $daoUser->Insert($user);
        //guardamos el usuario en la sesión 
        $user = $daoUser->Get($user->name);
        session_start();
        $_SESSION['user'] = array(
            'id' => $user->id,
            'name' => $user->name,
            'image' =>"default.png"
        );
        require "../vendor/cookieHandler.php";
        //cookie de sesion
        $cookieValue = $user->id; 
        $expiration = time() + (86400 * 30); // Tiempo de expiración: 30 días
        if (isset($_COOKIE['projectManagerCookies'])) {
        CookieHandler::setCookie('userid_cookie', $cookieValue, $expiration, '/', '', false, false);
        }
        // Redirigir al usuario a otra página
        header("Location: ../public/app");
        exit();
    }
}

function sendRegisterError($errorMessage) {
    session_start();
    $_SESSION['register_error'] = $errorMessage;
    header("Location: ../public/register");
    exit();
}

?>

