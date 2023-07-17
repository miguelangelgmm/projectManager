<?php

    $title = "Crear usuario";
    session_start();
    $content = ' <div class="mx-auto">
    <div class="ms-3">
        <h1>¡Descubre cómo simplificar tu vida!</h1>
        <p>Empieza a disfrutar de la facilidad en todo lo que haces</p>
    </div>';
    if (isset($_SESSION['register_error'])) {
        $errorMessage = $_SESSION['register_error'];
        unset($_SESSION['register_error']); // Limpiar el mensaje de error en la sesión
        $content .= '<div class="alert alert-danger">' . $errorMessage . '</div>';
    }
    // Definir el contenido específico de la página
    $content.= '

    <form id="registerForm" name="registerForm" role="form" class="needs-validation px-3" action="../private/procesar_registro.php" method="POST" novalidate>                <div class="row">
            <div class="col-lg-12">
                <div class="w-100 w-lg-auto mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-input w-100" id="username" name="username"  pattern="^[\w\d]{4,16}$" placeholder="Ingrese su usuario" required>
                    <div class="invalid-feedback ps-4">El nombre es obligatorio debe contener entre 4 y 16 caracteres</div>
                    <div class="valid-feedback ps-4">Correcto.</div>
                </div>
                <div class="w-100 w-lg-auto mb-3 position-relative">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-input w-100" id="password" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" placeholder="Ingrese su contraseña" required>
                    <div class="position-relative mt-1 me-2">
                    <img src="img/hidden.png" alt="Ojo cerrado" id="eye" class="position-absolute end-0 bottom-0 translate-middle-y icon-width">
                </div>
                    <div class="invalid-feedback ps-4">La contraseña debe tener al menos una letra mayúscula, dígito numérico, @$!%*?& y una longitud de 8 </div>
                    <div class="valid-feedback ps-4">Correcto.</div>

                </div>
                <div class="w-100 w-lg-auto mb-3">
                    <label for="confirmPassword" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-input w-100" id="confirmPassword" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" name="confirmPassword" placeholder="Confirme su contraseña" required>
                <div class="position-relative mt-1 me-2">
                    <img src="img/hidden.png" alt="Ojo cerrado" id="eye2" class="position-absolute end-0 bottom-0 translate-middle-y icon-width">
                </div>
                <div class="invalid-feedback ps-4">Las contraseñas deben ser iguales</div>
                <div class="valid-feedback ps-4">Correcto.</div>
                </div>
                <div class="w-100 w-lg-auto mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-input w-100" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                    <div class="invalid-feedback ps-4">El correo debe ser valido</div>
                    <div class="valid-feedback ps-4">Correcto.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
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
            <img src="img/google.png" alt="Icono de Google" class="me-2 icon-width">Registrarse con
            Google
        </a>
    </div>
-->
    <div class="w-100 text-center my-3">
        <a  href="./login">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>
</div>';

    // Incluir la plantilla
    require 'layout/layout_user.php';
?>
