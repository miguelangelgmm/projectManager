function defaultCheckElement(event) {
    this.value = this.value;
    if (!this.checkValidity()) {
        showFeedBack($(this), false);
    } else {
        showFeedBack($(this), true);
    }
}

function showFeedBack(input, valid, message) {
    let validClass = valid ? "is-valid" : "is-invalid";
    let div = valid
        ? input.nextAll("div.valid-feedback")
        : input.nextAll("div.invalid-feedback");
    input.nextAll("div").removeClass("d-block");
    div.removeClass("d-none").addClass("d-block");
    input.removeClass("is-valid is-invalid").addClass(validClass);
    if (message) {
        div.empty();
        div.append(message);
    }
}

function validationForm(formName) {
    let form = document.querySelector("form[name='" + formName + "']");

    if (!form) {
        console.log("El formulario con el nombre '" + formName + "' no existe.");
        return;
    }

    $(form).attr("novalidate", true);

    $(form).submit(function (event) {
        event.preventDefault();
        let isValid = true;
        let firstInvalidElement = null;

        $($(this).find("input, textarea").get().reverse()).each(function () {
            let inputValue = $(this);
            let exit = true;
            if (this.type === "hidden") {
                // Mostrar el campo oculto temporalmente
                inputValue.attr("type", "text");

                // Realizar la validación
                if (!inputValue[0].checkValidity()) {
                    isValid = false;
                    showFeedBack(inputValue, false);
                    firstInvalidElement = inputValue;
                } else {
                    showFeedBack(inputValue, true);
                }

                // Ocultar el campo oculto nuevamente
                inputValue.attr("type", "hidden");
            } else if (this.type === "date") {
                if (!validateDate(inputValue.val())) {
                    isValid = false;
                    showFeedBack(inputValue, false);
                    firstInvalidElement = inputValue;
                } else {
                    showFeedBack(inputValue, true);
                }
            } else {
                if (!inputValue[0].checkValidity()) {
                    isValid = false;
                    showFeedBack(inputValue, false);
                    firstInvalidElement = inputValue;
                } else {
                    showFeedBack(inputValue, true);
                }
            }
        });

        if (isValid) {
            form.submit();
        } else {
            firstInvalidElement.focus();
        }
    });

    $(form).find("input").on("input", defaultCheckElement);
    $(form).find("textarea").on("input", defaultCheckElement);
}

function validateDate(dateString) {
    const datePattern = /^\d{4}-\d{2}-\d{2}$/;
    return datePattern.test(dateString);
}

validationForm('addTaskForm');
validationForm('editTaskForm');
