import { CookieUtils } from "./cookieUtils.js";

export class taskApp {
    constructor() {}

    init() {
        this.#bindAddTask();
        this.groupPerson = document.querySelector("#group-person ul");
        this.groupSubTask = document.querySelector("#group-Task ul");

        this.groupPersonEdit = document.querySelector("#group-person-Edit ul");

        this.listPerson = document.getElementById("PersonNewTask");
        this.btnAddPerson = document.getElementById("addPerson");
        this.btnAddSubTask = document.getElementById("addSubTask");
        this.subTask = document.getElementById("TaskNewTask");
        this.subTaskEdit = document.getElementById("TaskEditTask");

        this.#bindAddPersonSubTask();
        this.#bindAddSubTask();
        this.personAdd = [];
        this.subTaskAdd = [];
        this.hiddenPerson = document.getElementById("hiddenPerson");
        this.hiddenPersonEdit = document.getElementById("hiddenPersonEdit");

        this.hiddenTask = document.getElementById("hiddenTask");
        this.hiddenTaskEdit = document.getElementById("hiddenTaskEdit");
        this.#bindShowModalTask0();
        this.#bindBtnDevelop();
        this.developList = document.getElementById("listTask-2");
        this.endList = document.getElementById("listTask-3");
        this.#bindDeleteTask();
        this.#bindShowModalTask1();
        this.#bindBtnEndTask();
        this.#bindShowModalEndTask();
        this.#bindEditTask();
        this.#bindAddSubTaskEdit();
        this.listSubtaskEdit = [];
        this.listPersonEdit = [];
        this.listPersonEditInput = document.getElementById("PersonEditTask");

        this.groupSubTaskEdit = document.querySelector("#group-Task-Edit ul");

        this.#bindAddPersonSubTaskEdit();
    }

    #bindAddTask = () => {
        let handlerAdd = this.#handlerAddTask;
        $(document).on("click", "#addTask", function () {
            handlerAdd();
        });
    };

    #bindAddSubTask = () => {
        let handlerAdd = this.#handlerAddSubTask;
        if (this.btnAddSubTask) {
            $(this.btnAddSubTask).on("click", (e) => {
                handlerAdd();
                e.stopPropagation();
                e.preventDefault();
            });
        }
    };
    #handlerAddSubTask = () => {
        let subTask = this.subTask.value.trim();
        if (subTask.length == 0) {
            console.log("no se puede agregar sin valor");
        } else {
            this.subTaskAdd.push(subTask);
            //establecemos el valor al campo oculto
            $(this.hiddenTask).val("");
            let taskData = this.subTaskAdd.join(",");
            $(this.hiddenTask).val(taskData);

            let pos = this.subTaskAdd.length - 1;
            const subtaskElem = document.createElement("li");
            subtaskElem.classList.add("task_list", "mx-1", "my-2");
            subtaskElem.innerHTML = `
            <span class='task_lisk__close'>X</span>
            <span>${subTask}</span>
            `;

            $(this.groupSubTask).append(subtaskElem);
            this.#bindRemoveSubTask(
                subtaskElem.querySelector(".task_lisk__close"),
                pos
            );
        }
    };
    #bindRemoveSubTask = (taskHtml, pos) => {
        let handlerRemove = this.#handlerRemoveSubTask;
        taskHtml.addEventListener("click", () => {
            handlerRemove(taskHtml, pos);
        });
    };

    #handlerRemoveSubTask = (taskHtml, pos) => {
        taskHtml.parentElement.remove();
        this.subTaskAdd.splice(pos, 1);
        $(this.hiddenTask).val("");  
        $(this.hiddenTask).val(this.subTaskAdd.join(","));  
    };

    #handlerAddTask = () => {
        let modal = $("#addModal");
        $(this.groupPerson).empty();
        $(this.groupSubTask).empty();

        let alert = document.querySelector("#alert-newPerson");
        if (alert) {
            alert.remove();
        }
        this.personAdd.length = 0; //vaciamos el array de personas
        this.subTaskAdd.length = 0; //vaciamos el array de subtareas

        let inputs = document.querySelectorAll("#addTaskForm input,textarea");
        inputs.forEach(function (input) {
            input.value = input.defaultValue;
            input.classList.remove("is-valid", "is-invalid");
        });
        this.#hideFeedback();

        modal.modal("show");
    };

    #handlerAddPersonSubTask = () => {
        let person =
            this.listPerson.options[this.listPerson.selectedIndex].text;
        let alert = document.querySelector("#alert-newPerson");

        if (this.personAdd.includes(person)) {
            // Mostrar alerta si la persona ya está añadida
            if (alert) {
                alert.innerHTML = `${person} ya está añadida.         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
            } else {
                const alertMessage = `${person} ya está añadida.`;
                const alertTemplate = `
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-newPerson">
            ${alertMessage}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
                // Agregar la alerta al contenedor deseado
                $(this.groupPerson.parentElement).prepend(alertTemplate);
            }
        } else {
            if (alert) {
                alert.remove(); // Eliminamos la alerta
            }
            // Agregar la persona y mostrar en la lista
            this.personAdd.push(person);
            //establecemos el valor al campo oculto
            $(this.hiddenPerson).val("");
            let personData = this.personAdd.join(",");
            $(this.hiddenPerson).val(personData);

            const personElement = document.createElement("li");
            personElement.classList.add("task_list", "mx-1", "my-2");
            personElement.innerHTML = `
            <span class='task_lisk__close'>X</span>
            <span>${person}</span>
            `;
            $(this.groupPerson).append(personElement);
            this.#bindRemovePesonSubTask(
                personElement.querySelector(".task_lisk__close"),
                person
            );
        }
    };
    #bindAddPersonSubTask = () => {
        let handlerAdd = this.#handlerAddPersonSubTask;
        if (this.btnAddPerson) {
            $(this.btnAddPerson).on("click", (e) => {
                handlerAdd();
                e.stopPropagation();
                e.preventDefault();
            });
        }
    };

    #bindRemovePesonSubTask = (personHtml, person) => {
        let handlerRemove = this.#handlerRemovePesonSubTask;

        personHtml.addEventListener("click", () => {
            handlerRemove(personHtml, person);
        });
        //establecemos el valor al campo oculto
        $(this.hiddenTask).val("");
        let taskData = this.subTaskAdd.join(",");
        $(this.hiddenTask).val(taskData);
    };

    #handlerRemovePesonSubTask = (personHtml, person) => {
        personHtml.parentElement.remove();
        const index = this.personAdd.indexOf(person);
        if (index !== -1) {
            this.personAdd.splice(index, 1); // Eliminar la persona del array
        }
        //establecemos el valor al campo oculto
        $(this.hiddenPerson).val("");
        let personData = this.personAdd.join(",");
        $(this.hiddenPerson).val(personData);
    };

    #hideFeedback() {
        let feedbackElements = document.querySelectorAll(
            ".valid-feedback, .invalid-feedback"
        );
        feedbackElements.forEach(function (element) {
            element.classList.add("d-none");
            element.classList.remove("d-block");
        });
    }

    #bindShowModalTask0 = () => {
        let tasks0 = document.querySelectorAll(".taskProject_0 li div");

        tasks0.forEach((task) => {
            task.addEventListener("click", (event) => {
                //evitamos que si hago click en el botón de eliminar se mueste el modal
                if (
                    !event.currentTarget.classList.contains("card-task-close")
                ) {
                    this.#HandleShowModalTask0(
                        task.getAttribute("data-id"),
                        task.getAttribute("data-task")
                    );
                }
            });
        });
    };

    #HandleShowModalTask0 = (idProject, idTask) => {
        console.log(idProject);
        $("#taskone .modal-content .modal-body").empty();
        $("#taskone").modal("show");

        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + idProject + "&action=modal0&idTask=" + idTask,
        })
            .then((response) => response.json())
            .then((data) => {
                // console.log(data);
                let subtaskLi = data[1].subtasks
                    .split(",")
                    .map((task) => {
                        return `<li>${task}</li>`;
                    })
                    .join(" ");
                let personsDiv = data[0]
                    .map((person) => {
                        return `<div class = "col-3 text-center"><img class="profile-pic img-fluid h-75" src="./../img/${person.image}" alt="${person.image}"><h1 class="name">${person.name}</h1></div>`;
                    })
                    .join(" ");
                $("#taskone .modal-content .modal-body").append(`
                <div class="modal-header">
                <h5 class="modal-title" id="taskoneLabel">${data[1].name}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h4>Descripción de la tarea</h4>
                <h6>${data[1].description}</h6>
                <ul class = "listNumber">
                    ${subtaskLi}
                </ul>
                <h4>Personas asignadas:</h4>
                <div class="row">
                    ${personsDiv}
                </div>
                </div>
                <div class="mx-2">
                <span class="d-block text-secondary">
                Fecha de inicio: ${data[1].start_date}
                </span>
                <span class="d-block text-secondary">
                Fecha de fin: ${data[1].end_date}
                </span>
                </span>
                <span id="id-modal-Todo" class="d-none" data-id=${data[1].id}>
                </span>
                </div>
                `);
            })
            .catch((error) => {
                console.error("Error en la solicitud AJAX:", error);
            });
    };

    #bindDeleteTask = () => {
        let btnDel = document.querySelectorAll(
            ".card-task-close:not(.btn-delete)"
        );
        let handlerDelete = this.#handleDeleteTask;
        if (btnDel) {
            btnDel.forEach((btn) => {
                let idTask = btn.parentElement.getAttribute("data-task");
                //le añadimos el evento de eliminar btn
                btn.classList.add("btn-delete");
                btn.addEventListener("click", (event) => {
                    handlerDelete(idTask);
                    event.stopPropagation();
                });
            });
        }
    };

    #handleDeleteTask = (id) => {
        console.log(id);
        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + id + "&action=delete",
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.sucess == "OK") {
                    let task = document.querySelector(
                        `[data-task='${id}']`
                    ).parentElement;
                    let taskCopy = task.cloneNode(true);
                    task.remove();
                } else {
                    console.log("no tiene permisos");
                }
            });
    };

    #bindBtnDevelop = () => {
        let handler = this.#handlerBtnDevelop;
        $(document).on("click", "#btn-develop", function () {
            let id = document
                .getElementById("id-modal-Todo")
                .getAttribute("data-id");
            handler(id);
        });
    };

    #handlerBtnDevelop = (id) => {
        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + id + "&action=develop",
        })
            .then((response) => response.json())
            .then((data) => {
                //seleccionamos la tarea, creamos una copia y la eliminamos
                let task = document.querySelector(
                    `[data-task='${id}']`
                ).parentElement;
                let taskCopy = task.cloneNode(true);
                //eliminamos la clase para poder volver a asignarle el evento
                let btnDelete = taskCopy.querySelector(".btn-delete");
                btnDelete.classList.remove("btn-delete");
                this.developList.appendChild(taskCopy);
                this.#bindShowModalTask1();
                this.#bindDeleteTask();
                task.remove();
            });
    };

    #bindShowModalTask1 = () => {
        let tasks1 = document.querySelectorAll(
            "#listTask-2 li div:not(.develop)"
        );

        tasks1.forEach((task) => {
            task.classList.add("develop");
            task.addEventListener("click", (event) => {
                //evitamos que si hago click en el botón de eliminar se mueste el modal
                if (
                    !event.currentTarget.classList.contains("card-task-close")
                ) {
                    this.#HandleShowModalTask1(
                        task.getAttribute("data-id"),
                        task.getAttribute("data-task")
                    );
                }
            });
        });
    };

    #HandleShowModalTask1 = (idProject, idTask) => {
        console.log(idProject);
        $("#tasksecond .modal-content .modal-body").empty();
        $("#tasksecond").modal("show");

        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + idProject + "&action=modal0&idTask=" + idTask,
        })
            .then((response) => response.json())
            .then((data) => {
                // console.log(data);
                let subtaskLi = data[1].subtasks
                    .split(",")
                    .map((task) => {
                        return `<li>${task}</li>`;
                    })
                    .join(" ");
                let personsDiv = data[0]
                    .map((person) => {
                        return `<div class = "col-3 text-center"><img class="profile-pic img-fluid h-75" src="./../img/${person.image}" alt="${person.image}"><h1 class="name">${person.name}</h1></div>`;
                    })
                    .join(" ");
                $("#tasksecond .modal-content .modal-body").append(`
                <div class="modal-header">
                <h5 class="modal-title" id="tasksecondLabel">${data[1].name}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h4>Descripción de la tarea</h4>
                <h6>${data[1].description}</h6>
                <ul class = "listNumber">
                    ${subtaskLi}
                </ul>
                <h4>Personas asignadas:</h4>
                <div class="row">
                    ${personsDiv}
                </div>
                </div>
                <div class="mx-2">
                <span class="d-block text-secondary">
                Fecha de inicio: ${data[1].start_date}
                </span>
                <span class="d-block text-secondary">
                Fecha de fin: ${data[1].end_date}
                </span>
                </span>
                <span id="id-modal-Toend" class="d-none" data-id=${data[1].id}>
                </span>
                </div>
                `);
            })
            .catch((error) => {
                console.error("Error en la solicitud AJAX:", error);
            });
    };

    #bindBtnEndTask = () => {
        let handler = this.#handlerBtnendTask;
        $(document).on("click", "#btn-end-task", function () {
            let id = document
                .getElementById("id-modal-Toend")
                .getAttribute("data-id");
            handler(id);
        });
    };

    #handlerBtnendTask = (id) => {
        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + id + "&action=endTask",
        })
            .then((response) => response.json())
            .then((data) => {
                //seleccionamos la tarea, creamos una copia y la eliminamos
                let task = document.querySelector(
                    `[data-task='${id}']`
                ).parentElement;
                let taskCopy = task.cloneNode(true);
                //eliminamos la clase para poder volver a asignarle el evento
                let btnDelete = taskCopy.querySelector(".btn-delete");
                btnDelete.classList.remove("btn-delete");
                this.endList.appendChild(taskCopy);
                this.#bindDeleteTask();
                this.#bindShowModalEndTask();
                task.remove();
            });
    };

    #bindShowModalEndTask = () => {
        let tasks1 = document.querySelectorAll("#listTask-3 li div:not(.end)");

        tasks1.forEach((task) => {
            task.classList.add("end");
            task.addEventListener("click", (event) => {
                //evitamos que si hago click en el botón de eliminar se mueste el modal
                if (
                    !event.currentTarget.classList.contains("card-task-close")
                ) {
                    this.#HandleShowModalEndTask(
                        task.getAttribute("data-id"),
                        task.getAttribute("data-task")
                    );
                }
            });
        });
    };

    #HandleShowModalEndTask = (idProject, idTask) => {
        console.log(idProject);
        $("#tasksend .modal-content .modal-body").empty();
        $("#tasksend").modal("show");

        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "id=" + idProject + "&action=modal0&idTask=" + idTask,
        })
            .then((response) => response.json())
            .then((data) => {
                // console.log(data);
                let subtaskLi = data[1].subtasks
                    .split(",")
                    .map((task) => {
                        return `<li>${task}</li>`;
                    })
                    .join(" ");
                let personsDiv = data[0]
                    .map((person) => {
                        return `<div class = "col-3 text-center"><img class="profile-pic img-fluid h-75" src="./../img/${person.image}" alt="${person.image}"><h1 class="name">${person.name}</h1></div>`;
                    })
                    .join(" ");
                $("#tasksend .modal-content .modal-body").append(`
                <div class="modal-header">
                <h5 class="modal-title" id="tasksendLabel">${data[1].name}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h4>Descripción de la tarea</h4>
                <h6>${data[1].description}</h6>
                <ul class = "listNumber">
                    ${subtaskLi}
                </ul>
                <h4>Personas asignadas:</h4>
                <div class="row">
                    ${personsDiv}
                </div>
                </div>
                <div class="mx-2">
                <span class="d-block text-secondary">
                Fecha de inicio: ${data[1].start_date}
                </span>
                <span class="d-block text-secondary">
                Fecha de fin: ${data[1].end_date}
                </span>
                </span>
                </div>
                `);
            })
            .catch((error) => {
                console.error("Error en la solicitud AJAX:", error);
            });
    };

    #bindEditTask = () => {
        let handler = this.#handleEditTask;
        $(document).on("click", "#btn-edit-task", function () {
            handler();
        });
    };





    
    #handleEditTask = () => {
        let idTask = document
            .getElementById("id-modal-Todo")
            .getAttribute("data-id");
        fetch("../../app/Controllers/taskController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "action=update&idTask=" + idTask,
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);

                let modal = $("#editModal");
                let listPerson = $("#group-person-Edit ul");
                let listSubtask = $("#group-Task-Edit ul");

                $("#hiddenTaskEditId").val(data[1].id);
                $("#titleEditTask").val(data[1].name);
                $("#descripcionEditTask").val(data[1].description);
                $("#fechaInicioEdit").val(data[1].start_date);
                $("#fechaFinEdit").val(data[1].end_date);

                listPerson.empty();
                listSubtask.empty();

                //creamos los usuarios que ya existen
                data[0].forEach((user) => {
                    this.listPersonEdit.push(user.name);
                    const personElement = document.createElement("li");
                    personElement.classList.add("task_list", "mx-1", "my-2");
                    personElement.innerHTML = `
                <span class='task_lisk__close'>X</span>
                <span>${user.name}</span>
                `;
                    $(listPerson).append(personElement);
                    this.#bindRemovePesonSubTaskEdit(
                        personElement.querySelector(".task_lisk__close"),
                        user.name
                    );
                });
                $("#hiddenPersonEdit").val("");
                let personData = this.listPersonEdit.join(",");
                $("#hiddenPersonEdit").val(personData);   
                this.listSubtaskEdit.push(...data[1].subtasks.split(","));
                
                //establecemos el valor al campo oculto
                $("#hiddenTaskEdit").val(this.listSubtaskEdit.join(","));

                this.listSubtaskEdit.forEach((subTask, pos) => {
                    const subtaskElem = document.createElement("li");
                    subtaskElem.classList.add("task_list", "mx-1", "my-2");
                    subtaskElem.innerHTML = `
                <span class='task_lisk__close'>X</span>
                <span>${subTask}</span>
                `;

                    listSubtask.append(subtaskElem);
                    this.#bindRemoveSubTaskEdit(
                        subtaskElem.querySelector(".task_lisk__close"),
                        pos
                    );
                });

                modal.modal("show");
            });
    };

    #bindRemovePesonSubTaskEdit = (personHtml, person) => {
        let handlerRemove = this.#handlerRemovePesonSubTaskEdit;

        personHtml.addEventListener("click", () => {
            handlerRemove(personHtml, person);
        });
        //establecemos el valor al campo oculto
        $(this.hiddenTask).val("");
        let taskData = this.listSubtaskEdit.join(",");
        $(this.hiddenTask).val(taskData);
    };

    #handlerRemovePesonSubTaskEdit = (personHtml, person) => {
        personHtml.parentElement.remove();
        const index = this.listPersonEdit.indexOf(person);
        if (index !== -1) {
            this.listPersonEdit.splice(index, 1); // Eliminar la persona del array
        }
        //establecemos el valor al campo oculto

        $("#hiddenPersonEdit").val("");
        let personData = this.listPersonEdit.join(",");
        $("#hiddenPersonEdit").val(personData);   

    };

    #bindRemoveSubTaskEdit = (taskHtml, pos) => {
        let handlerRemove = this.#handlerRemoveSubTaskEdit;
        taskHtml.addEventListener("click", () => {
            handlerRemove(taskHtml, pos);
        });
    };

    #handlerRemoveSubTaskEdit = (taskHtml, pos) => {
        taskHtml.parentElement.remove();
        this.listSubtaskEdit.splice(pos, 1);

        $(this.hiddenTaskEdit).val(this.listSubtaskEdit.join(","));
    };

    #bindAddPersonSubTaskEdit = () => {
        let handlerAdd = this.#handlerAddPersonSubTaskEdit;
        $(document).on("click", "#EditPerson", (e) => {
            handlerAdd();
            e.stopPropagation();
            e.preventDefault();
        });
    };

    #handlerAddPersonSubTaskEdit = () => {
        let person =
            this.listPersonEditInput.options[
                this.listPersonEditInput.selectedIndex
            ].text;
        let alert = document.querySelector("#alert-newPerson");

        if (this.listPersonEdit.includes(person)) {
            // Mostrar alerta si la persona ya está añadida
            if (alert) {
                alert.innerHTML = `${person} ya está añadida.         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
            } else {
                const alertMessage = `${person} ya está añadida.`;
                const alertTemplate = `
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-newPerson">
        ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
                // Agregar la alerta al contenedor deseado
                $(this.groupPersonEdit.parentElement).prepend(alertTemplate);
            }
        } else {
            if (alert) {
                alert.remove(); // Eliminamos la alerta
            }
            // Agregar la persona y mostrar en la lista
            this.listPersonEdit.push(person);
            //establecemos el valor al campo oculto
            $(this.hiddenPersonEdit).val("");
            let personData = this.listPersonEdit.join(",");
            $(this.hiddenPersonEdit).val(personData);

            const personElement = document.createElement("li");
            personElement.classList.add("task_list", "mx-1", "my-2");
            personElement.innerHTML = `
        <span class='task_lisk__close'>X</span>
        <span>${person}</span>
        `;
            $(this.groupPersonEdit).append(personElement);
            this.#bindRemovePesonSubTaskEdit(
                personElement.querySelector(".task_lisk__close"),
                person
            );
        }
    };

    #bindAddSubTaskEdit = () => {
        let handlerAdd = this.#handlerAddSubTaskEdit;
        $(document).on("click", "#addSubTaskEdit", (e) => {
            handlerAdd();
            e.stopPropagation();
            e.preventDefault();
        });
    };

    #handlerAddSubTaskEdit = () => {
        let subTask = this.subTaskEdit.value.trim();
        if (subTask.length == 0) {
            console.log("no se puede agregar sin valor");
        } else {
            this.listSubtaskEdit.push(subTask);
            //establecemos el valor al campo oculto
            $(this.hiddenTaskEdit).val("");
            let taskData = this.listSubtaskEdit.join(",");
            $(this.hiddenTaskEdit).val(taskData);

            let pos = this.listSubtaskEdit.length - 1;
            const subtaskElem = document.createElement("li");
            subtaskElem.classList.add("task_list", "mx-1", "my-2");
            subtaskElem.innerHTML = `
            <span class='task_lisk__close'>X</span>
            <span>${subTask}</span>
            `;

            $(this.groupSubTaskEdit).append(subtaskElem);
            this.#bindRemoveSubTaskEdit(
                subtaskElem.querySelector(".task_lisk__close"),
                pos
            );
        }
    };




}
