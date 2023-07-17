import { CookieUtils } from "./cookieUtils.js";

export class SettingsApp {
    constructor() {
    }

    init() {
        this.settings = document.getElementById("settings");
        this.userId =  document.getElementById("user-id").textContent;
        this.#bindOpenSettings();
        this.modal = $("#settingsModal");
        this.btnSession = document.getElementById("closeSessionButton");
        this.#bindCloseSession();
        this.btnUpdate = document.getElementById("saveSettingsButton");
        this.#bindUpdateUser();
        this.image = document.getElementById("imageInput")
    }

    #bindOpenSettings = () => {
        let modal = $("#settingsModal")
        let handler = this.#handlerOpenSettings;
        let handlerHidden = this.#handlerCloseModal;
        this.settings.addEventListener("click",function(){
            handler(modal);
        })

        modal.on("hidden.bs.modal", function() {
            handlerHidden();
        });
    }
    #handlerCloseModal = () => {

        this.image.value = ""; 
        let messageDiv = document.getElementById("messageDivImage").innerHTML ="";

    }

    #handlerOpenSettings = (modal) =>{
        modal.modal("show");
    }

    #bindCloseSession = () => {
        let handler = this.#handlerSession;
        this.btnSession.addEventListener("click",function(){
            handler();
        })
    }
    #bindUpdateUser = () => {
        let handler = this.#handlerChangeImg;
        this.btnUpdate.addEventListener("click",function(e){
            handler(e);
        })
    }
    #handlerSession = () =>{

        // Eliminar la cookie 'userid'
       // document.cookie = "userid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        fetch('../app/Controllers/settingController.php', {
            method: 'POST',
            headers: {
                //Para cifrar la información en el mensaje
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `action=close`
            })
        .then((response) => {
                location.reload();
            })
        .catch((error) => {
            console.error('Error al obtener las notificiaciones: ' + error);
        });
    }

    #handlerChangeImg = (e) =>{

        let image = this.image.files[0];
        if (!image || !image.type.startsWith('image/')) {
            e.stopPropagation();
            let messageDiv = document.getElementById("messageDivImage");
            let message;
            let alertClass;
                message = "Debes introducir una imagen";
                alertClass = "alert-danger";
            

            messageDiv.innerHTML = `
                <div class="alert ${alertClass}">
                    ${message}
                </div>
            `;
        }else{
            let fileURL = URL.createObjectURL(image);
            console.log(fileURL);

            let formData = new FormData();
            formData.append('image', image);
            formData.append('action', "update");
            fetch('../app/Controllers/settingController.php', {
                method: 'POST',
                body: formData
                })
            .then((response) => {
                if(response.ok){
                    location.reload();
                }else{
                    let result = JSON.parse(response);
                    let messageDiv = document.getElementById("messageDivImage");
                    let message;
                    let alertClass;
    
                    if (result.sucess == "OK") {
                        message = "Solicitud enviada correctamente";
                        alertClass = "alert-success";
                    } else {
                        message = "Debes introducir una imagen";
                        alertClass = "alert-danger";
                    }
    
                    messageDiv.innerHTML = `
                        <div class="alert ${alertClass}">
                            ${message}
                        </div>
                    `;
                }
            })
            .catch((error) => {
                console.error('Error al obtener las notificiaciones: ' + error);
            });
        }

    }

}