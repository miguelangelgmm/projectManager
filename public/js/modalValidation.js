function defaultCheckElement(event) {
    this.value = this.value;
    if (!this.checkValidity()) {
        showFeedBack($(this), false);
    } else {
        showFeedBack($(this), true);
    }
}

function projectCheckElement(event) {
    this.value = this.value.trim();
    if (!this.checkValidity()) {
        showFeedBack($(this), false);
    } else {
        showFeedBack($(this), true);
    }
}

function showFeedBack(input, valid, message) {
    let validClass = valid ? "is-valid" : "is-invalid";
    let feedbackDiv = valid
        ? input.nextAll("div.valid-feedback")
        : input.nextAll("div.invalid-feedback");
    input.nextAll("div").removeClass("d-block");
    feedbackDiv.removeClass("d-none").addClass("d-block");
    input.removeClass("is-valid is-invalid").addClass(validClass);
    if (message) {
        feedbackDiv.empty();
        feedbackDiv.append(message);
    }
}

function formValidation(form, inputs) {
    $(form).attr("novalidate", true);

    event.preventDefault();

    let isValid = true;
    let firstInvalidElement = null;

    inputs.forEach((input) => {
        let inputValue = $(input).val().trim();
        let maxLength = $(input).attr("maxlength");

        if (inputValue.length === 0 || inputValue.length > maxLength) {
            isValid = false;
            showFeedBack($(input), false);
            if (firstInvalidElement === null) {
                firstInvalidElement = input;
            }
        } else {
            showFeedBack($(input), true);
        }
    });

    if (isValid) {
        reset(form);
        return true;
    } else {
        firstInvalidElement.focus();
    }

    function reset(form) {
        let feedbackDivs = $(form).find(
            "div.valid-feedback, div.invalid-feedback"
        );
        feedbackDivs.removeClass("d-block").addClass("d-none");
        let formInputs = $(form).find("input, textarea");
        formInputs.removeClass("is-valid is-invalid");
    }
}

function addNoteFormValidation() {
    let form = document.forms.addNoteForm;
    let inputs = [form.noteTitle, form.noteContent];

    $(form.noteTitle).on("input", defaultCheckElement);
    $(form.noteContent).on("input", defaultCheckElement);

 //   form.stopPropagation();

    return formValidation(form, inputs);
}

function addProjectFormValidation() {
    let form = document.forms.addProjectForm;
    let inputs = [form.groupName, form.groupDescription];

    $(form.groupName).on("input", defaultCheckElement);
    $(form.groupDescription).on("input", defaultCheckElement);

    return formValidation(form, inputs);
}

export { addNoteFormValidation,addProjectFormValidation };
