import { addProjectFormValidation } from "../../public/js/modalValidation.js";
import { CookieUtils } from "./cookieUtils.js";

    export class CreateProjectApp {
        #createModal;
        #btnSave;
        #userId;
        #nameModal;
        #contentModal;
        #dataGroup;
        #groupPosition = 0;
        #projectsUser;
        #searchProject;
        #loginProject;
        #groupSearchName;
        #dataListProjects;
        #cantCreateProject;
        #seachProject;
        #searchProjectFormResult;
        constructor() {
        }
    
        init() {
            this.btnProject = document.getElementById("create-project");
            this.#createModal = document.getElementById("createProjectModal");
            this.#btnSave = document.getElementById("saveProjectBtn");
            this.#bindCreateProject();
            this.#userId = document.getElementById("user-id").textContent;
            this.#nameModal = document.getElementById("groupName");
            this.#contentModal = document.getElementById("groupDescription");
            this.#dataGroup = document.getElementById("data-group");
            this.#searchProject = document.getElementById("search-project")
            this.#loginProject = document.getElementById("login-proyect");
            this.#groupSearchName = document.getElementById("groupSearchName");
            this.#dataListProjects = document.getElementById("dataListProjects");
            this.#cantCreateProject = document.getElementById("cantCreateProject");
            this.#seachProject = document.getElementById("seachProject");
            this.#searchProjectFormResult = document.getElementById("searchProjectFormResult");
            this.#handleGetAllGroup();

            this.#bindSearchProject();
            this.#bindSearchListProject();
            this.#bindSearchProjectByName();
            this.#bindNotSubmit();
        }

        #bindNotSubmit(){
            let forms = document.getElementsByTagName("form");
            for (let i = 0; i < forms.length; i++) {
                forms[i].addEventListener("submit", function(event) {
                  event.preventDefault(); // Evitar el envío del formulario
                });
            }
        }

        #bindCreateProject() {
        const bindSave = this.#bindSaveProject.bind(this); 
            this.btnProject.addEventListener("click", () => {
                $(this.#createModal).modal("show");
                bindSave();
            });
        }
    
        #bindSaveProject() {
            this.#btnSave.addEventListener("click", () => {
                const isValid = addProjectFormValidation();
                console.log(isValid)
                if(isValid){
                    this.#handlerSaveProject();

                }
                
            });
        }

        #handlerSaveProject(){
            let name =  this.#nameModal;
            let content = this.#contentModal;
            let update = this.#handleUpdateList;
            let cantCreate = this.#cantCreateProject;
            $.ajax({
                url: "../app/Controllers/projectController.php",
                method: "POST",
                data: {
                    action: "insert",
                    userId: this.#userId,
                    name: name.value,
                    description: content.value,
                },
                success: function (response) {
                    console.log(response)
                    if(response.includes("Exception: Error en la consulta: Duplicate entry")){
                        cantCreate.classList.remove("d-none");
                        cantCreate.classList.add("d-block");

                    }else{
                        name.value="";
                        content.value="";
                        cantCreate.classList.remove("d-block");
                        cantCreate.classList.add("d-none");
                        $("#createProjectModal").modal("hide");
                    }
                    
                },
                error: function () {
                    // Ha ocurrido un error en la solicitud
                    console.error(
                        "Error en la solicitud AJAX:");
                    },
                }).done(() => {
                    update(this.#userId).then(userProjects => {
                    this.#projectsUser = userProjects;

                    }).catch(error => {
                        console.error("Error en la solicitud de actualización:", error);
                    });
                });
                
    }

        #handleUpdateList(UserId) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "../app/Controllers/projectController.php",
                    method: "POST",
                    data: {
                        action: "load",
                        userId: UserId
                    },
                    success: function (response) {
                        let projects = JSON.parse(response);
                        resolve(projects); // Resuelve la promesa con el valor de projects
                    },
                    error: function (error) {
                        reject(error); // Rechaza la promesa con el error
                    }
                });
            });
        }


    #handleGetAllGroup(){
        
        let divDataGroup = this.#dataGroup;
        let pos = this.#groupPosition;
        let next =this.#bindNextProject;
        let previous =this.#bindPreviousProject;
        let loginProject  = this.#loginProject;
        let userProjects; 
        $(divDataGroup).empty();
        $(divDataGroup).append(`<div class="spinner-border text-info spinner" role="status"></div>`)
        $.ajax({
            url: "../app/Controllers/projectController.php",
            method: "POST",
            data: {
                action: "load",
                userId: this.#userId
            },
            success: function (response) {
                userProjects  = JSON.parse(response);;
                $(divDataGroup).empty();
                let projects = JSON.parse(response);
                console.log(projects);
                
                if (projects.length == 0) {

                    $(divDataGroup).append(`<h3>Aún no perteneces a ningún grupo</h3>`)
                }else{
                    let nameGroup = `
                    <div class="d-flex justify-content-around">
                    <svg xmlns="http://www.w3.org/2000/svg" id="previousProject" fill="currentColor" class="bi bi-arrow-left-circle-fill litle-icon cursor-pointer" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    <h3>${projects[pos][0].name} </h3>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" id="nextProject" fill="currentColor" class="bi bi-arrow-right-circle-fill litle-icon cursor-pointer" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg> 
                    </div>`
                    let descriptionTxt = projects[pos][0].description.length < 100 ? projects[pos][0].description : projects[pos][0].description.substring(0, 100) + "...";     
                    let description = `<p>${descriptionTxt}</p>`
                    let images = [];
                    let index = 0;
                    
                    while (index < projects[pos].length && index < 5) {
                        if (index !== 0) {
                            images.push(projects[pos][index].image);
                        }
                        index++;
                    }

                    let divImages = "<div id='img-group' class='row mb-3'>";

                    images.forEach((image) => {
                        divImages += `<img src="img/${image}" alt="${image}" class="col-4 col-sm-2">`;
                    });
                    
                    divImages += "</div>";
                    $(divDataGroup).append(nameGroup)
                    $(divDataGroup).append(description)
                    $(divDataGroup).append(divImages)
                    $(loginProject).attr("data-id", projects[pos][0].id);
                    $(loginProject).click(function(){
                        
                        window.location.href = `${window.location.href}/${projects[pos][0].name}` ;
                    });
                    next();
                    previous();
                }
            },
            error: function() {
                $(divDataGroup).empty();
                $(divDataGroup).append(`<h3>Error inesperado</h3>`);
            },
        }).done(() => {
            if (userProjects != null) {
                this.#projectsUser = userProjects;
                console.log(this.#projectsUser);
            }
        });
    }

    #bindNextProject = () => {


        document.getElementById("nextProject").addEventListener("click", () => {
            if(this.#groupPosition + 1 < this.#projectsUser.length){
                this.#groupPosition++
                this.#handleUpdateShowProject();
            }
        });
    }
    #bindPreviousProject = () => {
        
        
        document.getElementById("previousProject").addEventListener("click", () => {
            if(this.#groupPosition -1 >= 0){
                this.#groupPosition--
                this.#handleUpdateShowProject();
            }
        });
    }

    #handleUpdateShowProject(){

        let divDataGroup = this.#dataGroup;
        let pos = this.#groupPosition;
        let loginProject  = this.#loginProject;

        let projects = this.#projectsUser;

        $(divDataGroup).find("h3").eq(0).text(projects[pos][0].name);  
        
        let description = projects[pos][0].description.length < 100 ? projects[pos][0].description : projects[pos][0].description.substring(0, 100) + "...";     
        $(divDataGroup).find("p").eq(0).text(description);  
        
        let images = [];
        let index = 0;
        while (index < projects[pos].length && index < 5) {
            if (index !== 0) {
                images.push(projects[pos][index].image);
            }
            index++;
        }

        let divImages = "<div class='row mb-3'>";

        images.forEach((image) => {
            divImages += `<img src="img/${image}" alt="${image}" class="col-4 col-sm-2">`;
        });
        
        divImages += "</div>";

        $(divDataGroup).find("#img-group").eq(0).html(divImages)

        $(loginProject).attr("data-id", projects[pos]["0"].id);

        $(loginProject).off('click').click(function(){
            
            window.location.href = `${window.location.href}/${projects[pos][0].name}` ;
        });
    }

    #bindSearchProject = () => {

        const searchProjectButton = document.getElementById("search-project");

        searchProjectButton.addEventListener("click", () => {
            this.#handlerSearchProject();
        });
    }

    #handlerSearchProject(){
        const searchProjectModal = new bootstrap.Modal(document.getElementById("searchProjectModal"));

        searchProjectModal.show();

    }

    #bindSearchListProject = () => {

        const groupSearchName = this.#groupSearchName;

        groupSearchName.addEventListener("input", () => {
            const searchProject = groupSearchName.value;
            this.#handlerListSearchProject(searchProject);
        });
    }

    #handlerListSearchProject = (project) =>{

        let dataListProjects = this.#dataListProjects;
        $(dataListProjects).empty();
    $.ajax({
        url: "../app/Controllers/projectController.php",
        method: "POST",
        data: {
            action: "search",
            name: project
        },
        success: function(response) {
            // Manejar la respuesta exitosa
            //console.log(response);
            let listProject = JSON.parse(response);

            $(dataListProjects).empty()
            listProject.forEach((project)=>{

                let option = `<option value = "${project[0].name}"> `;
                $(dataListProjects).append(option);
            })

        },
        error: function() {
            // Manejar el error en la solicitud
            console.error("Error en la solicitud AJAX");
        }
    });
    }

    #bindSearchProjectByName = () => {

        const seachProject = this.#seachProject;
        seachProject.addEventListener("click", () => {
            const searchProject = groupSearchName.value;
            this.#handlerSearchProjectName(searchProject);
        });
    }

    #handlerSearchProjectName = (searchProject)=> {
        console.log(searchProject)
        let showProject = this.#searchProjectFormResult;
        let dataListProjects = this.#dataListProjects;
        let requestJoin = this.#bindRequestJoin;
        $(dataListProjects).empty();
        $(showProject).empty()
        $(showProject).append(`
        <div class="text-center">
            <div class="spinner-border text-info spinner" role="status"></div>
        </div>
        `)
        $.ajax({
            url: "../app/Controllers/projectController.php",
            method: "POST",
            data: {
                action: "getProjectByName",
                name: searchProject
            },
            success: function(response) {
                $(showProject).empty()
                // Manejar la respuesta exitosa
                //console.log(response);
                let listProject = JSON.parse(response);
                if(listProject){

                    console.log(listProject)
                    let container = (`
                    <div class="text-center">
                        <h3>${listProject[0].name}</h3>
                        <p>${listProject[0].description}</p><br>

                    `)

                    let divImages = "<div class='row mb-3'>";

                    listProject.forEach((image,index) => {

                        if(index != 0){
                            divImages += `<img src="img/${image.image}" alt="${image.name}" class="col-4 col-sm-2">`;
                        }
                    });
                    
                    divImages += "</div>";
                    container +=divImages;
                    container += "</div>";
                    container += "<button class='btn btn-primary' id='requestJoin'>Solicitar unirse</button> <div id ='messageDiv' class='mt-3'></div>";
                    $(showProject).append(container)
                    requestJoin(listProject[0].creator_id,listProject[0].name);
                }
            },
            error: function() {
                // Manejar el error en la solicitud
                console.error("Error en la solicitud AJAX");
            }
        });
    }

    #bindRequestJoin = (creator_id,nameProject) => {
        console.log(creator_id)
        const requestJoinButton = document.getElementById("requestJoin");
    
        requestJoinButton.addEventListener("click", () => {
            this.#handlerRequestJoin(creator_id,nameProject);
        
        });
    }
    #handlerRequestJoin = (creator_id,nameProject) =>{
        let userId = this.#userId;
            console.log(userId);

            $.ajax({
                url: "../app/Controllers/notificationController.php",
                method: "POST",
                data: {
                    action: "RequestJoin",
                    userId: userId,
                    creator_id:creator_id,
                    nameProject:nameProject
                },
                success: function(response) {

                    let result = JSON.parse(response);
                    let messageDiv = document.getElementById("messageDiv");
                    let message;
                    let alertClass;
    
                    if (result.sucess == "OK") {
                        message = "Solicitud enviada correctamente";
                        alertClass = "alert-success";
                    } else {
                        message = "Ya se ha enviado una solicitud anteriormente";
                        alertClass = "alert-danger";
                    }
    
                    messageDiv.innerHTML = `
                        <div class="alert ${alertClass}">
                            ${message}
                        </div>
                    `;

                },
                error: function() {
                    // Manejar el error en la solicitud
                    console.error("Error en la solicitud AJAX");
                }
            });
            
    }

}
