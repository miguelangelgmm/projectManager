function defaultCheckElement(event) {
	this.value = this.value;
	if (!this.checkValidity()) {
		showFeedBack($(this), false);
	} else {
		showFeedBack($(this), true);
	}
}
function passwordCheckElement(password) {

    if (this.value !== password) {
		showFeedBack($(this), false, "Las contraseñas no coinciden");
	} else {
		showFeedBack($(this), true);
	}
}
function showFeedBack(input, valid, message) {
    let validClass = (valid) ? 'is-valid' : 'is-invalid';
	let div = (valid) ? input.nextAll("div.valid-feedback") : input.nextAll("div.invalid-feedback");
	input.nextAll('div').removeClass('d-block');
	div.removeClass('d-none').addClass('d-block');
	input.removeClass('is-valid is-invalid').addClass(validClass);
	if (message) {
		div.empty();
		div.append(message);
	}
}
function newUserValidation() {
    let form = document.forms.registerForm;

    $(form).attr('novalidate', true);

    $(form).submit(function (event) {
        event.preventDefault();

        let isValid = true;
        let firstInvalidElement = null;
        let username = $(form.username).val();

        let usernamePromise = $.ajax({
            url: '../app/Controller/validation.php?type=username',
            type: 'POST',
            data: { username: username }
        });

        let email = $(form.email).val();
        let emailPromise = $.ajax({
            url: '../app/Controller/validation.php?type=email',
            type: 'POST',
            data: { email: email }
        });

        $.when(usernamePromise, emailPromise).done(function (usernameResponse, emailResponse) {
            if (usernameResponse[0].exists) {
                isValid = false;
                firstInvalidElement = form.username;
                console.log("El nombre de usuario ya existe");
            }

            if (emailResponse[0].exists) {
                isValid = false;
                firstInvalidElement = form.email;
                console.log("El correo electrónico ya está en uso");
            }

            if (!form.confirmPassword.checkValidity()) {
                isValid = false;
                showFeedBack($(form.confirmPassword), false);
                firstInvalidElement = form.confirmPassword;
            } else {
                showFeedBack($(form.confirmPassword), true);
            }

            if (form.confirmPassword.value !== form.password.value) {
                isValid = false;
                showFeedBack($(form.confirmPassword), false);
                firstInvalidElement = form.confirmPassword;
            } else {
                showFeedBack($(form.confirmPassword), true);
            }

            if (!form.password.checkValidity()) {
                isValid = false;
                showFeedBack($(form.password), false);
                firstInvalidElement = form.password;
            } else {
                showFeedBack($(form.password), true);
            }

            if (!form.username.checkValidity()) {
                isValid = false;
                showFeedBack($(form.username), false);
                firstInvalidElement = form.username;
            } else {
                showFeedBack($(form.username), true);
            }

            if (isValid) {
            form.submit();

            } else {
                firstInvalidElement.focus();
            }
        }).fail(function () {
            console.log('Error en una o más peticiones Ajax');
        });
    });

    form.addEventListener('reset', function (event) {
        let feedDivs = $(this).find('div.valid-feedback, div.invalid-feedback');
        feedDivs.removeClass('d-block').addClass('d-none');
        let inputs = $(this).find('input');
        inputs.removeClass('is-valid is-invalid');
    });

    $(form.username).on('input', defaultCheckElement);
    $(form.password).on('input', defaultCheckElement);

    $(form.password).on('input', function (event) {
        passwordCheckElement.call(form.confirmPassword, form.password.value);
    });

    $(form.confirmPassword).on('input', function (event) {
        passwordCheckElement.call(this, form.password.value);
    });

    $(form.email).on('input', defaultCheckElement);
}

function togglePassword(passwordId, eyeId) {
    let password = document.getElementById(passwordId);
    let eye = document.getElementById(eyeId);
    password.type = (password.type === "password") ? "text" : "password";
    eye.src = (password.type === "password") ? "img/hidden.png" : "img/eye.png";
}

function addTogglePasswordEvent(passwordId, eyeId) {
    let eye = document.getElementById(eyeId);
    if (eye) {
        eye.addEventListener("click", function() {
            togglePassword(passwordId, eyeId);
        });
    }
}

function loginValidation() {
    let form = document.forms.loginForm;

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let username = form.username.value;
        let password = form.password.value;

        // Realizar validaciones
        let isValid = true;
        let firstInvalidElement = null;

        if (username.trim() === "") {
            isValid = false;
            firstInvalidElement = form.username;
            showFeedBack($(form.username), false);
        }

        if (password.trim() === "") {
            isValid = false;
            firstInvalidElement = form.password;
            showFeedBack($(form.password), false);
        }

        if (isValid) {
            form.submit();
        } else {
            firstInvalidElement.focus();
        }
    });

    form.addEventListener("reset", function (event) {
        let inputs = form.querySelectorAll("input");
        inputs.forEach(function (input) {
            input.value = "";
        });
    });
}
