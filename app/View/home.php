<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $data["title"]; ?></title>
    <link rel="icon" href="img/project-management.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="body">
    <header class="header rounded-bottom">
        <nav class="d-flex justify-content-between align-items-center mx-3 mb-3 pb-2">
        <img src="img/project-management.png" class="img-icon-logo" id="logo" alt="logo"/>

        <div class=" align-item-center justify-content-center" >
            <a class="py-2 px-3 rounded-2 btn-login text-decoration-none" href="./login">Iniciar sesión</a>
            <a class="py-2 px-3 rounded-2 btn-login text-decoration-none" href="./register">Crear cuenta</a>
        </div>
    </nav>
</header>
<main class="main">
    
    <div class="d-flex mx-3 row">

        <div class="col">
            <p class="h0">La mejor forma de realizar tus proyectos</p>
            <h1 class="h4 my-4">Gestiona tus proyectos</h1>

            <div class="accordionVertical d-flex rounded-2 overflow-hidden accordionCard-green text-light">
                <div class="accordionCard accordionCard-green d-flex accordionDefault " id="accordion1"> 
                    <div>
                        <span class="mx-3 h5">1</span>
                    </div>                       
                    <div class="d-none">
                    <h3>Colabora en tiempo real</h3>
                    <p class="d-lg-block d-none">Sepa en todo momento sus tareas</p>
                </div>
                </div>
                <div class="accordionCard accordionCard-pink d-flex rounded-3 ">
                    <span class="mx-3 h5">2</span>
                    <div class="d-none">
                        <h3>Seguimiento del proceso</h3>
                    <p class="d-lg-block d-none"  >Controla el proyecto por medio de las tareas pendientes realizadas y por hacer</p>
                    </div>
                </div>
                <div class="accordionCard accordionCard-green d-flex">
                    <span class="mx-3 h5">3</span>
                    <div class="d-none">
                        <h3>Trabaja de forma individual</h3>
                    <p  class="d-lg-block d-none">Organiza tus propios proyectos gracias a nuestras herramientas</p>
                    </div>

                </div>
            </div>

            <div class=" justify-content-center d-flex my-5 position-relative">
            <img src="img/itsfree2.png" class="position-absolute its-free-png img-fluid">
                <a href="/proyectoweb2/public_html/create"  class="btn btn-primary btn-green px-5 py-3">empieza ahora</a>
            </div>
        </div>
        <div class="d-lg-block d-none m-0 p-0 col my-3">
            <img src="img/writing-working-person-coffee-music-group-910524-pxhere.com.jpg" class="w-100 h-100 rounded-5 img-shadow"/>
        </div>
        </div>

        <div id="Formas-de-Trabajo" class="py-3">
            <h2 class="text-light ms-4">Descubre todas las formas de trabajar </h2>

            <div  class="WorkMethods">
            <ul class="row  justify-content-center p-0 mx-2 ">

                <li class="col-lg-4 col-sm-6 d-flex  justify-content-between py-3">
                    <div class="mx-2 w-100 rounded-5 d-flex justify-content-between py-2 method">
                        <div class="ms-2 my-2">
                            <h2>Github</h2>
                            <p>Manten controlado tus repositorios remotos</p>
                            <a href="/proyectoweb2/public_html/create" class="text-decoration-none text-dark text-animated h5"> Empieza ahora</a>
                        </div>

                        <img class=" w-100 me-2 img-Mehtod" src="img/git.png" alt="github"> 

                        
                    </div>

                </li>

                <li class="col-lg-4 col-sm-6 d-flex  justify-content-between py-3 rou">
                    <div class="mx-2 w-100 rounded-5 d-flex justify-content-between py-2 method">
                        <div class="ms-2 my-2">
                            <h2>Productividad</h2>
                            <p>Podrás saber todo lo que ocurre en cualquier momento</p>
                            <a href="/proyectoweb2/public_html/create" class="text-decoration-none text-dark text-animated h5"> Empieza ahora</a>

                        </div>

                        <img class=" w-100 me-2 img-Mehtod rounded-circle" src="img/productividad.avif" alt="github"> 

                        
                    </div>

                </li>
                
                <li class="col-lg-4 col-sm-6 d-flex  justify-content-between py-3">
                    <div class="mx-2 w-100 rounded-5 d-flex justify-content-between py-2 method">
                        <div class="ms-2 my-2">
                            <h2>Scrum</h2>
                            <p>Mejor forma de organizarse</p>
                            <a href="/proyectoweb2/public_html/create" class="text-decoration-none text-dark text-animated h5"> Empieza ahora</a>
                        </div>

                        <img class=" w-100 me-2 img-Mehtod" src="img/scrum.png" alt="github"> 

                        
                    </div>

                </li>
            </ul>
        </div>

        </div>
</main>

    <!-- Modal de confirmación de cookies -->
    <div class="modal fade" id="cookiesModal" tabindex="-1" aria-labelledby="cookiesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cookiesModalLabel">Confirmación de cookies</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea guardar las cookies para mejorar su experiencia en nuestro sitio web?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" id="yes-cookie" class="btn btn-primary" data-bs-dismiss="modal">Sí</button>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script type="module"  src="../app/View/home.js"></script>

</body>
</html>