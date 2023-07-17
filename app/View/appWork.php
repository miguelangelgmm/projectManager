<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="icon" href="../../public/img/project-management.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body class="body">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-2 col-3  h-99">
                <nav id="nav" class="nav-fixed">
                    <div class="h-100 py-2 ">

                        <ul class="bg-dark-blue h-100 rounded-5">
                            <li>
                                <!--
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
                                        echo "<img src='../../public/img/$data[image]' class='icon-50' >";
                                    ?>
                                    <span class="d-none d-lg-flex mt-3 ms-3 mb-3"><?php echo $data['name'] ?></span>
                                </div>
                            </a>
                            </li>

                            <hr class="custom-hr mt-0">

                            <li>
                                <a class="h3 text-decoration-none color-gray" href="http://localhost/proyectoWeb3/public/app">
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
        
            <main class="col-sm-10 col-9 h-100 p-3 h-100" id="<?php echo $data["idProject"] ?>">
                
                <div class="row w-100 gap-3 gap-md-5 h-100 ">
                    <div class="col-lg col-12 bg-card rounded-4 h-auto max-width-33">
                        <h1 class="text-center">Por hacer</h1>
                        <hr class="custom-hr">
                        <ul class="mx-0 px-0 taskProject_0 ">
                            <!--Añadir tareas-->

                            <?php 
                                foreach ($data["taskProject"] as $key => $value) {
                                    if($value->state==0){
                                        echo "
                                        <li class='card-task card-task__white my-2'>
                                        <div class='task' data-id='$value->project_id' data-task = '$value->id'>
                                            <h2 class='card-task-title'>$value->name</h2>
                                            <hr>
                                            <p class='card-task-description'>$value->description</p>
                                            <hr>
                                            <div class='card-task-date card-task-date__grey'>
                                                <span>$value->start_date / </span>
                                                <span>$value->end_date </span>
                                            </div>
                                            <div class='card-task-close'>
                                            <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash icon' viewBox='0 0 16 16'>
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                            </svg>
                                            </div>
                                        </div>
                                    </li>
                                    
                                        ";
                                    }
                                }
                            ?>
                            <li class="mx-0 px-0">
                                <?php
                                if($data["typeUser"] == "admin"){
                                echo"
                                <button class=' mx-auto btn btn-secondary w-100 mt-3' id= 'addTask' data-toggle='modal' data-target='#addModal'> 
                                    <svg xmlns='http://www.w3.org/2000/svg'  fill='currentColor' class='bi bi-plus-circle icon' viewBox='0 0 16 16' >
                                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                        <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                    </svg>
                                </button>
                                ";
                                
                            }

                                ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg col-12 bg-card rounded-4 h-auto max-width-33">
                        <h1 class="text-center">En progreso</h1>
                        <hr class="custom-hr">
                        <ul class="mx-0 px-0 " id = "listTask-2">
                        <?php 
                                foreach ($data["taskProject"] as $key => $value) {
                                    if($value->state==1){
                                        echo "
                                        <li class='card-task card-task__white my-2'>
                                        <div class='task' data-id='$value->project_id' data-task = '$value->id'>
                                        <h2 class='card-task-title'>$value->name</h2>
                                        <hr>
                                        <p class='card-task-description'> $value->description</p>
                                        <hr>
                                        <div class='card-task-date card-task-date__grey'>
                                            <span>$value->start_date / </span>
                                            <span>$value->end_date </span> 
                                        </div>
                                        <div class='card-task-close'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash icon' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                        </svg>
                                        </div>
                                    </div>
                                    </li>
                                        ";
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="col-lg col-12 bg-card rounded-4 h-auto max-width-33">
                        <h1 class="text-center">Finalizado</h1>
                        <hr class="custom-hr">
                        <ul class="mx-0 px-0" id = "listTask-3">
                        <?php 
                                foreach ($data["taskProject"] as $key => $value) {
                                    if($value->state==2){
                                        echo "
                                        <li class='card-task card-task__white my-2'>
                                        <div class='task' data-id='$value->project_id' data-task = '$value->id'>
                                        <h2 class='card-task-title'>$value->name</h2>
                                        <hr>
                                        <p class='card-task-description'> $value->description</p>
                                        <hr>
                                        <div class='card-task-date card-task-date__grey'>
                                            <span>$value->start_date / </span>
                                            <span>$value->end_date </span> 
                                        </div>
                                        <div class='card-task-close'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash icon' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                        </svg>
                                        </div>
                                    </div>
                                    </li>
                                        ";
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>

            </main>


        </div>
    </div>
    <?php
if ($data["typeUser"] == "admin") {
    echo "
        <div class='modal' id='addModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Añadir una nueva tarea</h5>
                        <button type='button' class='btn-close close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form id='addTaskForm' name='addTaskForm' role='form' action='' method='POST' novalidate>
                            <div class='form-group my-2'>
                                <label for='titleNewTask'>Título de la tarea:</label>
                                <input type='text' class='form-control' id='titleNewTask' name='titleNewTask' placeholder='Ingrese el título' pattern='.+' title='El título debe tener entre 1 y 40 caracteres' required>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese un título válido (entre 1 y 40 caracteres).</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                            </div>
                            <div class='form-group my-2'>
                                <label for='descripcionNewTask'>Descripción:</label>
                                <textarea class='form-control' id='descripcionNewTask' name='descripcionNewTask' rows='3' placeholder='Ingrese la descripción' pattern='.+' title='La descripción debe tener entre 1 y 600 caracteres' required></textarea>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese una descripción válida (entre 1 y 600 caracteres).</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                            </div>
                            <div class='form-group my-2'>
                                <label for='TaskNewTask'>Tarea:</label>
                                <input type='text' class='form-control' id='TaskNewTask' placeholder='Ingrese la tarea'>

                                <button type='button' class='btn btn-primary my-3' id='addSubTask'>Agregar subtarea</button>                            </div>
                            <div id='group-Task'>
                                <span>Grupo de tareas</span>
                                <div class='w-100 list-contain' >
                                    <ul class='d-flex mx-0 px-0'>
                                    </ul>
                                </div>
                                <input type='hidden' id='hiddenTask' name ='hiddenTask' required>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese alguna tarea</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                                </div>
                            <div class='form-group my-2'>
                                <label for='PersonNewTask'>Persona asociada:</label>
                                <select class='form-control select2-input' id='PersonNewTask' placeholder='Ingrese la persona asociada'>";
    
    foreach ($data['users'] as $user) {
        echo "<option value='" . $user['id'] . "'>" . $user['name'] . "</option>";
    }

    echo "</select>
        <button class='btn btn-primary my-3' id='addPerson'>Agregar persona</button>
    </div>
    <div id='group-person'>
        <span>Personas asociadas</span>
        <div class='w-100'>
            <ul class='d-flex list-contain mx-0 px-0'>

            </ul>
            <input type='hidden' id='hiddenPerson' name ='hiddenPerson' required>
            <div class='invalid-feedback ps-4'>Por favor, ingrese alguna tarea</div>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
    </div>
    <div class='form-row'>
        <div class='form-group my-2 col-md-6'>
            <label for='fechaInicio'>Fecha de inicio:</label>
            <input type='date' class='form-control' id='fechaInicio' name ='initDate' value='" . date('Y-m-d') . "' pattern='\d{4}-\d{2}-\d{2}' required>
            <div class='invalid-feedback ps-4'>Por favor, ingrese una fecha de inicio válida.</div>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
        <div class='form-group my-2 col-md-6'>
            <label for='fechaFin'>Fecha de finalización:</label>
            <input type='date' class='form-control' id='fechaFin' name ='endDate'  value='" . date('Y-m-d') . "' pattern='\d{4}-\d{2}-\d{2}' required>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
    </div>
    <button type='submit' class='btn btn-primary my-3'>Enviar</button>
</form>
</div>
</div>
</div>
</div>
";
}
?>
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
                            <?php echo "<img src='../../public/img/$data[image]' class='user-image me-3 icon-50' alt='User Image'>"; ?>
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
    
    <div class="modal fade" id="taskone" tabindex="-1" aria-labelledby="taskoneLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            <?php 
                echo " 
                <div class='modal-footer'>
                
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                ";
            if($data["typeUser"] == "admin"){
                echo "<button type='button' id='btn-develop' class='btn btn-info' data-bs-dismiss='modal'>Pasar a desarrollo</button> ";
                echo "<button type='button' id='btn-edit-task' class='btn btn-warning' data-bs-dismiss='modal'>Editar tarea</button></div>";
            }
            ?>
            </div>

        </div>
    </div>

    <?php
if ($data["typeUser"] == "admin") {
    echo "
        <div class='modal' id='editModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Editar una tarea</h5>
                        <button type='button' class='btn-close close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form id='editTaskForm' name='editTaskForm' role='form' action='' method='POST' novalidate>
                            <div class='form-group my-2'>
                                <label for='titleEditTask'>Título de la tarea:</label>
                                <input type='text' class='form-control' id='titleEditTask' name='titleNewTask' placeholder='Ingrese el título' pattern='.+' title='El título debe tener entre 1 y 40 caracteres' required>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese un título válido (entre 1 y 40 caracteres).</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                            </div>
                            <div class='form-group my-2'>
                                <label for='descripcionEditTask'>Descripción:</label>
                                <textarea class='form-control' id='descripcionEditTask' name='descripcionNewTask' rows='3' placeholder='Ingrese la descripción' pattern='.+' title='La descripción debe tener entre 1 y 600 caracteres' required></textarea>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese una descripción válida (entre 1 y 600 caracteres).</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                            </div>
                            <div class='form-group my-2'>
                                <label for='TaskEditTask'>Tarea:</label>
                                <input type='text' class='form-control' id='TaskEditTask' placeholder='Ingrese la tarea'>

                                <button type='button' class='btn btn-primary my-3' id='addSubTaskEdit'>Agregar subtarea</button>                            </div>
                            <div id='group-Task-Edit'>
                                <span>Grupo de tareas</span>
                                <div class='w-100 list-contain' >
                                    <ul class='d-flex mx-0 px-0 '>
                                    </ul>
                                </div>
                                <input type='hidden' id='hiddenTaskEdit' name ='hiddenTaskEdit' required>
                                <div class='invalid-feedback ps-4'>Por favor, ingrese alguna tarea</div>
                                <div class='valid-feedback ps-4'>Correcto.</div>
                                </div>
                            <div class='form-group my-2'>
                                <label for='PersonEditTask'>Persona asociada:</label>
                                <select class='form-control select2-input' id='PersonEditTask' placeholder='Ingrese la persona asociada'>";
    
    foreach ($data['users'] as $user) {
        echo "<option value='" . $user['id'] . "'>" . $user['name'] . "</option>";
    }

    echo "</select>
        <button class='btn btn-primary my-3' id='EditPerson'>Agregar persona</button>
    </div>
    <div id='group-person-Edit'>
        <span>Personas asociadas</span>
        <div class='w-100'>
            <ul class='d-flex list-contain mx-0 px-0'>

            </ul>
            <input type='hidden' id='hiddenPersonEdit' name ='hiddenPersonEdit' required>
            <div class='invalid-feedback ps-4'>Por favor, ingrese alguna tarea</div>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
    </div>
    <div class='form-row'>
        <div class='form-group my-2 col-md-6'>
            <label for='fechaInicioEdit'>Fecha de inicio:</label>
            <input type='date' class='form-control' id='fechaInicioEdit' name ='initDate' value='" . date('Y-m-d') . "' pattern='\d{4}-\d{2}-\d{2}' required>
            <div class='invalid-feedback ps-4'>Por favor, ingrese una fecha de inicio válida.</div>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
        <div class='form-group my-2 col-md-6'>
            <label for='fechaFinEdit'>Fecha de finalización:</label>
            <input type='date' class='form-control' id='fechaFinEdit' name ='endDate'  value='" . date('Y-m-d') . "' pattern='\d{4}-\d{2}-\d{2}' required>
            <div class='valid-feedback ps-4'>Correcto.</div>
        </div>
    </div>
    <input type='hidden' id='hiddenTaskEditId' name ='hiddenTaskEditId' required>
    <button type='submit' class='btn btn-primary my-3'>Actualizar </button>
</form>
</div>
</div>
</div>
</div>
";
}
?>

    <div class="modal fade" id="tasksecond" tabindex="-1" aria-labelledby="tasksecondLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            <?php 
                echo " 
                <div class='modal-footer'>
                
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                ";
            if($data["typeUser"] == "admin"){
                echo "<button type='button' id='btn-end-task' class='btn btn-info' data-bs-dismiss='modal'>Finalizar tarea</button></div>                "
                ;
            }
            ?>
            </div>

        </div>
    </div>

    <div class="modal fade" id="tasksend" tabindex="-1" aria-labelledby="tasksendLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            <?php 
                echo " 
                <div class='modal-footer'>
                
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                ";
            ?>
            </div>

        </div>
    </div>

   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="../../app/View/appWork.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <?php
    if ($data["typeUser"] == "admin") {
        echo     "<script src='../js/generalValidation.js' ></script>";

    }
    ?>

<?php 
        echo '<span class="d-none" id="user-id">' . $data['id'] . '</span>';
?>

</body>

</html>