import { addNoteFormValidation } from "../../public/js/modalValidation.js";
import { CookieUtils } from "./cookieUtils.js";

export class NotesApp {
    constructor() {
        this.listNotes;
        this.loadingSpinner;
        this.titeNote;
        this.desciptionNote;
        this.spinnerNotes;
        this.userId;
        this.btnDelNote;
        this.save;
    }

    init() {
        this.titeNote = document.getElementById("noteTitle");
        this.desciptionNote = document.getElementById("noteContent");
        this.listNotes = document.getElementById("listNotes");
        this.spinnerNotes = document.getElementById("spinner-notes");
        this.btnDelNote = $("#btndelNote");
        this.userId =  document.getElementById("user-id").textContent;
        this.save = document.getElementById("saveNoteButton");
        this.#fetchNotes();
    }

    #fetchNotes() {
        this.spinnerNotes.style.display = "flex";

        fetch(
            `../app/Controllers/notesController.php?userId=${this.userId}&action=obtenerNotas`
        )
            .then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error(
                        "Error en la solicitud AJAX: " + response.status
                    );
                }
            })
            .then((data) => {
                this.spinnerNotes.style.display = "none";
                this.listNotes.innerHTML = "";

                data.forEach((note, index) => {
                    const li = document.createElement("li");
                    li.classList.add(
                        index % 2 === 0 ? "note-blue2" : "note",
                        "my-2",
                        "py-1",
                        "rounded-5",
                        "note-description",
                        "mx-neg-2"
                    );
                    li.setAttribute("data-id", note.id);

                    const div = document.createElement("div");
                    div.className = "py-2 ms-1 mx-lg-4 ";

                    const maxLength = 100;
                    let truncatedContent = note.content;
                    if (note.content.length > maxLength) {
                        truncatedContent =
                            note.content.substring(0, maxLength) + "...";
                    }

                    const titleSpan = document.createElement("span");
                    titleSpan.textContent = note.title;

                    const contentSpan = document.createElement("span");
                    contentSpan.textContent = truncatedContent;
                    contentSpan.classList.add(
                        "ms-1",
                        "d-none",
                        "d-md-inline-block"
                    );

                    div.appendChild(titleSpan);
                    div.appendChild(contentSpan);

                    div.addEventListener("click", () => {
                        const modal = $("#noteModal");
                        const modalTitle = $("#noteModalTitle");
                        const modalContent = $("#noteModalContent");

                        modalTitle.text(note.title);
                        modalContent.text(note.content);

                        const handleDeleteNote = () => {
                            const noteId = $(li).attr("data-id");

                            fetch(
                                `../app/Controllers/notesController.php?id=${noteId}&action=delete`
                            )
                                .then(() => {
                                    this.updateNotes();
                                })
                                .catch((error) => {
                                    console.error(
                                        "Error en la solicitud AJAX:",
                                        error
                                    );
                                });

                            $("#noteModal").modal("hide");
                        };
                        this.btnDelNote.click(handleDeleteNote);

                        $("#noteModal").on("hidden.bs.modal", () => {
                            this.btnDelNote.off("click", handleDeleteNote);
                        });

                        $("#noteModal").modal("show");
                    });

                    li.appendChild(div);
                    this.listNotes.appendChild(li);
                });

                this.#saveNote();
            })
            .catch((error) => {
                this.spinnerNotes.style.display = "none";
                console.error("Error al obtener las notas: " + error);
            });
    }

    #saveNote() {
        this.save.addEventListener("click", () => {
            const isValid = addNoteFormValidation();
            if (isValid) {
                $("#addnote").modal("hide");

                const titeNoteValue = this.titeNote.value;
                const desciptionNoteValue = this.desciptionNote.value;
                $(this.titeNote).val("");
                $(this.desciptionNote).val("");

                $.ajax({
                    url: "../app/Controllers/notesController.php?action=insertNote",
                    method: "POST",
                    data: {
                        title: titeNoteValue,
                        content: desciptionNoteValue,
                        userId: this.userId,
                    },
                    success: () => {
                        this.updateNotes();
                    },
                    error: (error) => {
                        console.log("Error en la petición AJAX", error);
                    },
                });
            }
        });
    }

    updateNotes() {
        this.spinnerNotes.style.display = "flex";

        fetch(
            `../app/Controllers/notesController.php?userId=${this.userId}&action=obtenerNotas`
        )
            .then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error(
                        "Error en la solicitud AJAX: " + response.status
                    );
                }
            })
            .then((data) => {
                this.spinnerNotes.style.display = "none";
                $("#listNotes").empty();

                data.forEach((note, index) => {
                    const li = document.createElement("li");
                    li.classList.add(
                        index % 2 === 0 ? "note-blue2" : "note",
                        "my-2",
                        "py-1",
                        "rounded-5",
                        "note-description",
                        "mx-neg-2"
                    );
                    li.setAttribute("data-id", note.id);

                    const div = document.createElement("div");
                    div.className = "py-2 ms-1 mx-lg-4 ";

                    const maxLength = 100;
                    let truncatedContent = note.content;
                    if (note.content.length > maxLength) {
                        truncatedContent =
                            note.content.substring(0, maxLength) + "...";
                    }

                    const titleSpan = document.createElement("span");
                    titleSpan.textContent = note.title;

                    const contentSpan = document.createElement("span");
                    contentSpan.textContent = truncatedContent;
                    contentSpan.classList.add(
                        "ms-1",
                        "d-none",
                        "d-md-inline-block"
                    );

                    div.appendChild(titleSpan);
                    div.appendChild(contentSpan);

                    div.addEventListener("click", () => {
                        const modal = $("#noteModal");
                        const modalTitle = $("#noteModalTitle");
                        const modalContent = $("#noteModalContent");

                        modalTitle.text(note.title);
                        modalContent.text(note.content);

                        const handleDeleteNote = () => {
                            const noteId = $(li).attr("data-id");

                            fetch(
                                `../app/Controllers/notesController.php?id=${noteId}&action=delete`
                            )
                                .then(() => {
                                    this.updateNotes();
                                })
                                .catch((error) => {
                                    console.error(
                                        "Error en la solicitud AJAX:",
                                        error
                                    );
                                });

                            $("#noteModal").modal("hide");
                        };

                        this.btnDelNote.click(handleDeleteNote);

                        $("#noteModal").on("hidden.bs.modal", () => {
                            this.btnDelNote.off("click", handleDeleteNote);
                        });

                        $("#noteModal").modal("show");
                    });

                    li.appendChild(div);
                    this.listNotes.appendChild(li);
                });
            })
            .catch((error) => {
                console.error("Error en la solicitud AJAX:", error);
            });
    }
}
