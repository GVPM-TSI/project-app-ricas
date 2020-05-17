<?php
session_start();
require_once('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imagem</title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
    <link rel="stylesheet" href="edit.css">
    <script src="edit.js"></script>
</head>

<body>
    <header>
        <?php
        if (!isset($_SESSION['codigo'])) {
            require_once('../../assets/includes/navbar.php');
        } else {
            require_once('../../assets/includes/navbarLogado.php');
        }
        ?>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <img id="img" class="center" src="../../assets/img/img.jpg" alt="">
            </div>
            </dv>

            <div class="row">
                <div class="col-md-6 mt-5">
                    <p>Bluer</p>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="10" value="0" class="slider" id="myRange" onChange="aplicaFiltro('img', 'myRange', 'px', 'blur')">
                        <p>Valor: <span id="demo"></span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <p>brightness</p>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="200" value="100" class="slider" id="myRange2" onChange="aplicaFiltro('img', 'myRange2', '%', 'brightness')">
                        <p>Valor: <span id="demo2"></span></p>
                    </div>
                </div>
            </div>
    </main>

</body>

</html>