import { CookieUtils } from "./cookieUtils.js";

export class NotificationsApp {
    constructor() {
        this.listNotifications;
    }

    init() {
        this.titeNotifications = document.getElementById("listNotifications");
        this.spinnerNotifications = document.getElementById("spinner-notifications");
        this.userId =  document.getElementById("user-id").textContent;

        this.#fetchNotifications();
    }

    #fetchNotifications =() => {
        let bindAccept = this.#bindAcceptRequest;
        let bindReject = this.#bindRejectRequest;
        this.spinnerNotifications.style.display = "flex";

        fetch('../app/Controllers/notificationController.php', {
            method: 'POST',
            headers: {
                //Para cifrar la información en el mensaje
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=getAll'
        })
        .then((response) => {
            return response.json(); // Convertir la respuesta a formato JSON
        })
        .then((data) => {
            this.spinnerNotifications.style.display = "none";
            if(data.length  > 0){
                let container ="";
                data.forEach(notif => {
                    console.log(notif)
                    if(notif.type === "0"){
                        console.log(notif)
                        container+=`<li class = 'h5'><p> ${notif.content} 
                        <button class="btn btn-success  accept-request"  data-id="${notif.id}" data-idUser="${notif.user_id}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-check2 litle-icon text-success" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
                        </svg>
                        </button> 
                        <button class="btn btn-danger reject-request" data-id="${notif.id}" data-idUser="${notif.user_id}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" class="bi bi-x litle-icon text-danger" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                        </button></p>
                        </li>`;
                    }else{
                        container+=`<li class = 'h5'>${notif.content}</li>`;
                    }

                });

                $(listNotifications).append(container);
                bindAccept();
                bindReject();
            }else{
                $(listNotifications).append("<li>No tienes notificaciones</li>")
            }

        })
        .catch((error) => {
            this.spinnerNotifications.style.display = 'none';
            console.error('Error al obtener las notas: ' + error);
        });
    }

    #bindAcceptRequest = () => {
        const requestJoinButtons = document.getElementsByClassName("accept-request");
        const handlerAcceptRequest = this.#handlerAcceptRequest;

        Array.from(requestJoinButtons).forEach(button => {
            button.addEventListener("click", function() {
                const regex = /en el grupo\s+(.+)/i;
                const text = this.parentNode.textContent;
                const name = regex.exec(text)[1].trim();
                console.log(name)
                console.log(this.dataset)
                handlerAcceptRequest(this.dataset.id,this.dataset.iduser,name)
            });
        });
    }

    #bindRejectRequest = () => {
        const requestJoinButtons = document.getElementsByClassName("reject-request");
        const handlerRejectRequest = this.#handlerRejectRequest;

        Array.from(requestJoinButtons).forEach(button => {
            button.addEventListener("click", function() {
                const regex = /en el grupo\s+(.+)/i;
                const text = this.parentNode.textContent;
                const name = regex.exec(text)[1].trim();
                console.log(name)
                console.log(this.dataset)

                handlerRejectRequest(this.dataset.id,this.dataset.iduser,name)
            });
        });
    }

    #handlerAcceptRequest = (id,idUser,name) =>{
        let fetchNotifications = this.#fetchNotifications;
        fetch('../app/Controllers/notificationController.php', {
            method: 'POST',
            headers: {
                //Para cifrar la información en el mensaje
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `action=Accept&idUser=${idUser}&idNotif=${id}&name=${name}`
            })
        .then((response) => {
            $("#listNotifications").empty();
            fetchNotifications();
            })

        .catch((error) => {
            console.error('Error al obtener las notificiaciones: ' + error);
        });
    }


    #handlerRejectRequest = (id,idUser,name) =>{
        let fetchNotifications = this.#fetchNotifications;
        fetch('../app/Controllers/notificationController.php', {
            method: 'POST',
            headers: {
                //Para cifrar la información en el mensaje
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `action=Reject&idUser=${idUser}&idNotif=${id}&name=${name}`
            })
        .then((response) => {
            $("#listNotifications").empty();
            fetchNotifications();
            })
        .then((data) => {

            
        })
        .catch((error) => {
            console.error('Error al obtener las notificiaciones: ' + error);
        });
    }
}