
import { CookieUtils } from "./cookieUtils.js";

export class NotesApp {
    constructor() {
        this.userId;
        this.profile;
    }

    init() {
        this.titeNote = document.getElementById("profile-user");
        this.userId =  document.getElementById("user-id").textContent;
    }

    #handlerSessionUser(){
        $.ajax({
            url: "../app/Controllers/projectController.php",
            method: "POST",
            data: {
                action: "getProjectByName",
                name: searchProject
            },
            success: function(response) {

                
            },
            error: function() {
                // Manejar el error en la solicitud
                console.error("Error en la solicitud AJAX");
            }
        });
    }
    
}
