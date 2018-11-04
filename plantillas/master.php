<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bd/librerias/ti.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php startblock('titulo') ?>
        <?php endblock() ?>
    </title>
    <link rel="stylesheet" href="/bd/assets/css/pulse-bootstrap.min.css">
    <link rel="stylesheet" href="/bd/assets/css/miCss.css">

    <script src="/bd/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/bd/assets/js/popper.js"></script>
    <script src="/bd/assets/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">HOTELES</a>
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datos maestros</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="/bd/vistas/ciudades.php">Ciudades</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php startblock('principal') ?>
    <?php endblock() ?>
</body>
</html>