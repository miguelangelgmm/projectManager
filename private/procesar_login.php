<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../app/Model/user.php";
    require "../app/Model/DaoUser.php";

    // Obtener los valores del formulario
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Crear una instancia del objeto User
    $user = new User();
    $user->id = null;
    $user->name = $username;
    $user->password = $password;
    $user->email = "prueba@gmail.com";
    $user->image = "default.png";

    // Crear una instancia del objeto DaoUser
    $daoUser = new DaoUser('proyectmanager');

    // Realizar las validaciones
    $errors = [];

    // Validar el nombre de usuario
    if (strlen($user->name) < 1) {
        $errors[] = "El nombre de usuario es obligatorio.";
    }

    // Validar la contraseña
    if (strlen($user->password) < 1) {
        $errors[] = "La contraseña es obligatoria.";
    }

    // Verificar si hay errores
    if (!empty($errors)) {
        // Mostrar los mensajes de error
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Verificar si el usuario existe en la base de datos
        $existingUser = $daoUser->Get($user->name);
        if ($existingUser) {
            // Verificar la contraseña
            if (password_verify($user->password, $existingUser->password)) {
                // Inicio de sesión exitoso
                session_start();
                $_SESSION['user'] = array(
                    'id' => $existingUser->id,
                    'name' => $existingUser->name,
                    'image' =>$existingUser->image
                );
                require "../vendor/cookieHandler.php";
                // Cookie de sesión
                $cookieValue = $existingUser->id;
                $expiration = time() + (86400 * 30); // Tiempo de expiración: 30 días
                if (isset($_COOKIE['projectManagerCookies'])) {
                    CookieHandler::setCookie('userid_cookie', $cookieValue, $expiration, '/', '', false, false);
                }
                // Redirigir al usuario a otra página
                header("Location: ../public/app");
                exit();
            } else {
                sendLoginError("La contraseña es incorrecta.");
                }
        } else {
            sendLoginError("El nombre de usuario no existe.");
        }
    }
}

function sendLoginError($errorMessage) {
    session_start();
    $_SESSION['login_error'] = $errorMessage;
    header("Location: ../public/login");
    exit();
}
?>
