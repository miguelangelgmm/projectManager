<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/project-management.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body
    class="vh-100 vw-100  d-flex align-items-center justify-content-center  body-min-height">
    <div class="row align-items-center justify-content-center w-100 h-100 overflow-x ">

        <div class="col-lg-6 d-none d-xl-block h-100 bg-grey">
            <div class="d-block align-items-center justify-content-center  h-100">
            <div class="ms-3 row w-100 h-25 ">
                    <img src="img/project-management.png" alt="logo" class="logo-login ms-5 mt-3"/>
                </div>
                <div class="row w-100 text-center h-25 mb-5">
                    <img src="img/project-management Login.png" alt="Imagen" class="img-fluid ">
                </div>
                <div class="row w-100 text-center h-25vh mt-5">
                    <div id="carouselExampleControls" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner h-100 mt-5">
                            <div class="carousel-item active h-100">
                                <h1>Mejora tu rendimiento</h1>
                                <p class="text-center">Ten todo a mano</p>
                                <br>
                            </div>
                            <div class="carousel-item h-100">
                                <h1>Manten todo organizado</h1>
                                <p class="text-center">Manten todo controlado</p>
                                <br>
                            </div>
                            <div class="carousel-item h-100">
                                <h1>Usa la filosofía Scrum</h1>
                                <p class="text-center">Usa metodologías ágiles</p>
                                <br>
                            </div>
                            <div class="carousel-item h-100">
                                <h1>Trabaja en equipo</h1>
                                <p class="text-center">Texto del cuarto elemento</p>
                                <br>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <div class="col  d-flex align-items-center justify-content-center h-100 bg-white">

            <?php echo $content ?>

        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <script src="js/formValidation.js"></script>
</body>

</html>
