import { CookieUtils } from "./cookieUtils.js";

export class CalendarApp {
    constructor() {
        this.month = null;
        this.year = null;
        this.dateUser = new Date();
        this.listDays = [];
        this.userId =  document.getElementById("user-id").textContent;
        
        this.svgLeft = null;
        this.svgRight = null;
        this.h3Element = null;
        this.daysElement = null;
        this.calendarContainer = null;
        this.calendarModal = null;
        this.calendarModalContent = null;
        this.calendarModalStatus = null;
        this.modalDateInf = null;
        this.modalTypeInf = null;
        this.modalContentInf = null;

    }

    init() {
        this.#createSvgLeft();
        this.#createSvgRight();
        this.#createH3Element();
        this.#createDaysElement();
        this.#createCalendarModal();

        this.calendarContainer = document.getElementById("calendarContainer");
        this.calendarContainer.appendChild(this.svgLeft);
        this.calendarContainer.appendChild(this.svgRight);
        this.calendarContainer.appendChild(this.h3Element);
        this.calendarContainer.appendChild(this.daysElement);

        $("#btnSaveCalendar").on("click", () => {
            const content = this.calendarModalContent.val();
            const status = this.calendarModalStatus.val();
            this.calendarModal.modal("hide");
            this.#saveDayInfo(content, status);
        });

        this.#updateCalendar();
        this.#getDays();
    }

    #createSvgLeft() {
        this.svgLeft = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
        );
        this.svgLeft.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        this.svgLeft.setAttribute("fill", "currentColor");
        this.svgLeft.setAttribute("class", "bi bi-arrow-left-circle-fill icon");
        this.svgLeft.setAttribute("viewBox", "0 0 16 16");
        this.svgLeft.classList.add("cursor-pointer");
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("d", "M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z");
    
        this.svgLeft.appendChild(path);
    

        this.svgLeft.addEventListener("click", () => {
            this.dateUser.setMonth(this.dateUser.getMonth() - 1);
            this.#updateCalendar();
            this.#getDays();
        });
    }

    #createSvgRight() {
        this.svgRight = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
        );
        this.svgRight.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        this.svgRight.setAttribute("fill", "currentColor");
        this.svgRight.setAttribute(
            "class",
            "bi bi-arrow-right-circle-fill icon"
        );
        this.svgLeft.setAttribute("style", "fill: black;"); // Establecer el color negro
        this.svgRight.setAttribute("viewBox", "0 0 16 16");
        this.svgRight.classList.add("cursor-pointer");

        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("d", "M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z");
    
        this.svgRight.appendChild(path);

        this.svgRight.addEventListener("click", () => {
            this.dateUser.setMonth(this.dateUser.getMonth() + 1);
            this.#updateCalendar();
            this.#getDays();
        });
    }

    #createH3Element() {
        this.h3Element = document.createElement("h3");
        this.h3Element.className = "px-3 py-2";
    }

    #createDaysElement() {
        this.daysElement = document.createElement("ol");
        this.daysElement.className = "date px-2 py-2";
        this.daysElement.id = "calendary-days";
    }

    #createCalendarModal() {
        this.calendarModal = $("#calendarModal");
        this.calendarModalContent = $("#calendarModalContent");
        this.calendarModalStatus = $("#calendarModalStatus");
        this.modalDateInf = document.getElementById("modalDateInf");
        this.modalTypeInf = document.getElementById("modalTypeInf");
        this.modalContentInf = document.getElementById("modalContentInf");
    }

    #updateCalendar() {
        this.month = this.dateUser.toLocaleString("default", { month: "long" });
        this.year = this.dateUser.getFullYear();
        this.h3Element.textContent = this.month + " " + this.year;

        // Limpiar el contenedor principal y añadir los elementos actualizados
        this.calendarContainer.innerHTML = "";
        const divElement = document.createElement("div");
        divElement.className =
            "d-flex mx-3 my-2 align-items-center text-center";
        divElement.appendChild(this.svgLeft);
        divElement.appendChild(this.svgRight);
        divElement.appendChild(this.h3Element);
        this.calendarContainer.appendChild(divElement);
        this.calendarContainer.appendChild(this.daysElement);
    }

    #updateDays() {

        
        // Limpiar los días existentes
        this.daysElement.innerHTML = "";

        // Días de la semana
        const daysOfWeek = ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"];
        for (let i = 0; i < daysOfWeek.length; i++) {
            const dayOfWeek = document.createElement("li");
            dayOfWeek.className = "day-name";
            dayOfWeek.textContent = daysOfWeek[i];
            this.daysElement.appendChild(dayOfWeek);
        }

        const currentMonth = this.dateUser.getMonth();
        const currentYear = this.dateUser.getFullYear();
        let firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        if (firstDayOfMonth === 0) {
            firstDayOfMonth = 7; // Ajustar el primer día al índice correcto
        }
                const daysInMonth = new Date(
            currentYear,
            currentMonth + 1,
            0
        ).getDate();
        let start = false;

        for (let day = 1; day <= daysInMonth; day++) {
            if (day == firstDayOfMonth && !start) {
                day = 1;
                start = true;
            }
            if (start) {
                const monthfind =
                    currentMonth + 1 >= 10
                        ? currentMonth + 1
                        : "0" + (currentMonth + 1);
                const dayfind = day >= 10 ? day : "0" + day;
                const datefind = currentYear + "-" + monthfind + "-" + dayfind;
                const pos = this.listDays.findIndex(function (day) {
                    return day.date == datefind;
                });
                let status = "";
                const statusbg = ["bg-info", "bg-success", "bg-danger"];
                if (pos != -1) {
                    status = statusbg[this.listDays[pos].type];
                }
                const dayElement = document.createElement("li");
                dayElement.className = `text-center my-2 ${status}`;
                dayElement.setAttribute(
                    "data-date",
                    currentYear + "-" + (currentMonth + 1) + "-" + day
                );
                dayElement.innerHTML = `<span class="day">${day}</span>`;
                this.daysElement.appendChild(dayElement);
                if (pos == -1) {
                    dayElement.addEventListener("click", () => {
                        const date = dayElement.getAttribute("data-date");
                        this.calendarModalContent.val("");
                        this.#showDateModal(date);
                    });
                } else {
                    dayElement.addEventListener("click", () => {
                        this.#showDateInf(this.listDays[pos]);
                    });
                }
            } else {
                const dayElement = document.createElement("li");
                dayElement.className = "text-center my-2";
                dayElement.textContent = " ";
                this.daysElement.appendChild(dayElement);
            }
        }
    }

    #showDateModal(date) {
        $("#noteModalDay").text(
            "Detalles del día: " + new Date(date).toLocaleDateString()
        );
        this.modalDate = date;
        this.calendarModal.modal("show");
    }

    #showDateInf(day) {
        const statusbg = ["información", "completado", "importante"];
        this.modalDateInf.textContent = day.date;
        this.modalTypeInf.textContent = statusbg[day.type];
        this.modalContentInf.textContent = day.content;
        $("#modalCalendarInf").modal("show");
    }

    #saveDayInfo(content, status) {
        $.ajax({
            url: "../app/Controllers/calendarController.php",
            method: "POST",
            data: {
                action: "insert",
                content: content,
                status: status,
                userId: this.userId,
                date: this.modalDate,
            },
            success: (response) => {
                this.#getDays();
            },
            error: (jqXHR, textStatus, errorThrown) => {
                console.error(
                    "Error en la solicitud AJAX:",
                    textStatus,
                    errorThrown
                );
            },
        });
    }

    #getDays() {
        $.ajax({
            url: "../app/Controllers/calendarController.php",
            method: "POST",
            data: {
                action: "list",
                userId: this.userId,
            },
            success: (response) => {
                this.listDays = JSON.parse(response);
            
                this.#updateDays();
            },
            error: () => {
                console.error(
                    "Error en la solicitud AJAX:",
                );
            },
        });
    }
}
