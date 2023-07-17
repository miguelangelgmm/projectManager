<?php

$title = "Iniciar sesión";

// Definir el contenido específico de la página
$content = '<div class="mx-auto">
<div class="ms-3">
    <h1>¡Nos alegra verte de nuevo!</h1>
    <p>Comienza a hacer las cosas más fáciles</p>
</div>';

// Verificar si hay un mensaje de error en la sesión
session_start();
if (isset($_SESSION['login_error'])) {
    $errorMessage = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // Limpiar el mensaje de error en la sesión
    $content .= '<div class="alert alert-danger">' . $errorMessage . '</div>';
}

$content .= '<form id="loginForm" name="loginForm" role="form" class="needs-validation px-3" action="../private/procesar_login.php" method="POST" novalidate>
    <div class="row">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="w-100 w-lg-auto mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-input  w-100" id="username" name="username"
                    placeholder="Ingrese su usuario" required>
                    <div class="invalid-feedback ps-4">El nombre es obligatorio</div>

                    </div>
            <div class="w-100 w-lg-auto mb-3 position-relative">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-input w-100" id="password" name="password"
                    placeholder="Ingrese su contraseña" required>
                    <div class="invalid-feedback ps-4">La contraseña es obligatoria</div>
                <div class="position-relative mt-1 me-2">
                    <img src="img/hidden.png" alt="Ojo cerrado" id="eye"
                        class="position-absolute end-0 bottom-0 translate-middle-y icon-width">
                </div>
            </div>
        <!--<p>¿Has olvidado tu contraseña? Haz clic <a href="#">aquí</a>.</p> -->
            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
        </div>
    </div>
</form>

<div class="d-flex w-100 flex-row align-items-center justify-content-center">
    <hr class="w-100">
    <span class="text-muted">O</span>
    <hr class="w-100">
</div>

<!--
<div class="w-100 text-center my-3 px-3 ">
    <a href="#" class="btn btn-google border w-100 font-weight-bold">
        <img src="img/google.png" alt="Icono de Google" class="me-2 icon-width">Iniciar sesión con
        Google
    </a>
</div>
-->
<div class="w-100 text-center my-3">
    <a  href="./register">¿Aún no tienes cuenta? registrate</a>
</div>
</div>
</div>';

?>
