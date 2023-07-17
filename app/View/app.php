<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="../public/img/project-management.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body class="body">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-2 col-3  h-99">
                <nav id="nav" class="nav-fixed">
                    <div class="h-100 py-2 ">

                        <ul class="bg-dark-blue h-100 rounded-5">
                            <!--
                            <li>
                                <a class="h3 text-decoration-none color-gray">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list icon my-3 " viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </a>
-->
                            </li>
                            <li class="pt-4">
                            <a class="h3 text-decoration-none color-gray">
                                <div id="profile-user" class="d-flex align-items-center my-2">
                                    <?php 
                                        echo "<img src='../public/img/$data[image]' class='icon-50' >";
                                    ?>
                                    <span class="d-none d-lg-flex mt-3 ms-3 mb-3"><?php echo $data['name'] ?></span>
                                </div>
                            </a>
                            </li>

                            <hr class="custom-hr mt-0">

                            <li>
                                <a class="h3 text-decoration-none color-gray">
                                    <div class="d-flex align-item-center align-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house  icon my-3" viewBox="0 0 16 16">
                                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                        </svg>
                                        <span class="d-none d-lg-flex mt-3 ms-3">Home</span>
                                    </div>
                                </a>
                            </li>
                            <li>
    
                            </li>
                            <li>
                                <hr class="custom-hr mb-0">
                                <a class="h3 text-decoration-none color-gray" id="settings">
                                    <div class="d-flex align-item-center align-content-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill icon my-3" viewBox="0 0 16 16">
                                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                        <span class="d-none d-lg-flex mt-3 ms-3">Ajustes</span>
                                    </div>
                                </a>
                            </li>
                            <hr class="custom-hr mt-0">

                        </ul>
                    </div>

                </nav>
            </div>
            <main class="col-sm-10 col-9 h-100 p-3 ">
                <div class="container-fluid h-100">
                    <div class="row h-50 row-md-height">
                        <div class="col-lg-4 col-12 card-min-height ">
                            <div class="h-100 p-2">
                                <div class="bg-card card-shadow h-100 rounded-4">
                                    <div class="ms-3 pt-3">
                                        <div  id="data-group" class="text-center">

                                        </div>
                                        <!--
                                        <h3>Mi equipo</h3>
                                        <h5>Nombre del equipo</h5>
                                        <h3>miembros</h3>
                                        <h4> foto de los miembros</h4>
                                        -->
                                        <div class="d-flex justify-content-center ">
                                            <button class="btn bg-purble me-2" id="login-proyect">Entrar</button>
                                            <button class="btn bg-purble me-2" id ="search-project">Buscar</button>
                                            <button id="create-project" class="btn bg-purble">Crear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 card-min-height ">
                            <div class="h-100 p-2">
                                <div class="bg-card card-shadow h-100 rounded-4">
                                    <div class="ms-3 pt-3 position-relative">
                                        <div class="d-flex   justify-content-around text-center">
                                            <h3>Por hacer</h3>

                                        </div>

                                        <ul class="ms-lg-4 contend-max-height mb-1">
                                    <?php for ($i = 0; $i < count($data['tasks']); $i++) { ?>
                                        <li class="h5 d-flex">
                                            <span class="ms-2"><?php echo $data['tasks'][$i]->__get("name"); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 card-min-height ">
                            <div class="h-100 p-2">
                                <div class="bg-card card-shadow h-100 rounded-4 py-2">
                                    <div>
                                        <div class="w-100">
                                            <div id="calendarContainer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row h-50 row-md-low-height card-min-height  mt-4 mt-sm-0">
                        <div class="col-lg-6 col-12 ">
                            <div class="h-100 p-2">
                                <div class="bg-card card-shadow h-100 rounded-4">
                                    <div class="pt-3 ps-3">
                                        <h3>Notificaciones</h3>
                                        <ul class="contend-max-height mt-3" id="listNotifications">
                                    </ul>
                                    <div class="d-flex justify-content-center">
                                                <div id="spinner-notifications" class="spinner-border spinner text-primary" role="status"></div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 ">
                            <div class="h-100 p-2">
                                <div class="bg-card card-shadow h-100 rounded-4">
                                    <div class="pt-3 ps-3">
                                        <div>
                                            <div class="d-flex justify-content-around text-center w-50">
                                                <h3>Notas</h3>
                                                <button id="notes-button" class=" bg-trans border-0" data-bs-toggle="modal" data-bs-target="#addnote">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-circle-dotted text-success icon" viewBox="0 0 16 16">
                                                        <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <ul class="ms-4 contend-max-height " id="listNotes">

                                            </ul>
                                            <div class="d-flex justify-content-center">
                                                <div id="spinner-notes" class="spinner-border spinner text-primary" role="status"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- Modales-->
    <div class="modal fade" id="addnote" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Añadir nota</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addNoteForm" name="addNoteForm" role="form" novalidate>
                        <div class="mb-3">
                            <label for="noteTitle" class="form-label">Título de la nota</label>
                            <input type="text" class="form-control" id="noteTitle" required maxlength="40">
                            <div class="invalid-feedback ps-4">El titulo no debe ser superior a 40 caracteres</div>
                            <div class="valid-feedback ps-4">Correcto.</div>
                        </div>
                        <div class="mb-3">
                            <label for="noteContent" class="form-label">Contenido de la nota</label>
                            <textarea class="form-control" id="noteContent" rows="3" required maxlength="600"></textarea>
                            <div class="invalid-feedback ps-4">El contenido no debe ser superior a 600 caracteres</div>
                            <div class="valid-feedback ps-4">Correcto.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveNoteButton">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Detalles de la nota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Título:</h6>
                    <p id="noteModalTitle"></p>
                    <h6>Contenido:</h6>
                    <p id="noteModalContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" id="btndelNote">Eliminar nota</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal del calendario para guardar un día del calendario-->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h5" id="noteModalDay"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Contenido:</h6>
                    <textarea id="calendarModalContent" class="form-control" rows="3"></textarea>
                    <h6>Estado:</h6>
                    <select id="calendarModalStatus" class="form-select">
                        <option value="information">Información</option>
                        <option value="completed">Completado</option>
                        <option value="important">Importante</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnSaveCalendar">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCalendarInf" tabindex="-1" aria-labelledby="modalCalendarInfLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCalendarInfLabel">Detalles del calendario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Fecha:</h6>
                    <p id="modalDateInf"></p>
                    <h6>Tipo:</h6>
                    <p id="modalTypeInf"></p>
                    <h6>Contenido:</h6>
                    <p id="modalContentInf" class="p-break"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createProjectModal" tabindex="-1"  aria-labelledby="modalCalendarInfLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form id="addProjectForm" name="addProjectForm" role="form" novalidate>
                        <div class="form-group">
                            <label for="groupName">Nombre del Grupo</label>
                            <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Ingrese el nombre del grupo" maxlength="30">
                            <div class="invalid-feedback ps-4">El nombre no debe ser superior a 30 caracteres</div>
                            <div class="valid-feedback ps-4">Correcto.</div>
                        </div>
                        <div class="form-group">
                            <label for="groupDescription">Descripción del Grupo</label>
                            <textarea class="form-control" id="groupDescription" rows="3" name="groupDescription" placeholder="Ingrese la descripción del grupo" maxlength="600"></textarea>
                            <div class="invalid-feedback ps-4">La descripción no debe ser superior a 600</div>
                            <div class="valid-feedback ps-4">Correcto.</div>
                        </div>
                    </form>
                </div>
                <div id="cantCreateProject" class="d-none mx-3 mb-2">
                    <p class="h5 mx-3 text-danger">Nombre de proyecto no disponible</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveProjectBtn">Crear</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="searchProjectModal" tabindex="-1"  aria-labelledby="searchProjectModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buscar Grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form id="searchProjectForm" name="searchProjectForm" role="form" method="post" novalidate>
                        <div class="form-group">
                            <label for="groupSearchName">Nombre del Grupo</label>
                            <div class="row">
                                <div class="col-10">
                                <input type="text" list="dataListProjects" class="form-control" id="groupSearchName" name="groupSearchName" placeholder="Ingrese el nombre del grupo" maxlength="30">
                                </div>
                                <div class="col-2">
                                <img src="../public/img/lupa.png" alt="Buscar" id="seachProject" class="img-fluid cursor-pointer">
                                </div>
                            </div>
                            <datalist id="dataListProjects">

                            </datalist>
                            <div class="invalid-feedback ps-4">El nombre no debe ser superior a 30 caracteres</div>
                            <div class="valid-feedback ps-4">Correcto.</div>
                        </div>
                    </form>
                    <div id="searchProjectFormResult">

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Ajustes</h5>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="settingsModalForm" name="settingsModalForm" role="form"  novalidate>
                    <div class="mb-3">
                        <label class="form-label">Nombre de usuario</label>
                        <p class="form-control"><?php echo $data['name']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="userImage" class="form-label">Imagen de usuario</label>
                        <div class="d-flex align-items-center">
                            <?php echo "<img src='../public/img/$data[image]' class='user-image me-3 icon-50' alt='User Image'>"; ?>
                            <div>
                                <input type="file" class="form-control-file" id="imageInput" accept="image/*">
                                <small class="form-text text-muted">Selecciona una imagen para cambiarla</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="messageDivImage">
            </div>
            <div class="modal-footer">
                <!--  <button type="button" class="btn btn-danger" id="deleteAccountButton">Eliminar cuenta</button> -->
                <button type="button" class="btn btn-secondary" id="closeSessionButton">Cerrar Sesión</button>
                <button type="submit" class="btn btn-primary" id="saveSettingsButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?php 
        echo '<span class="d-none" id="user-id">' . $data['id'] . '</span>';
?>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="../app/View/appHome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>