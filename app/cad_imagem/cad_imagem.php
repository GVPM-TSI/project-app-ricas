<?php
session_start();
require_once('../../conexao.php');
require_once('../../assets/includes/funcoes.php');

verify_session();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obras Primas</title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
    <link rel="stylesheet" href="cad_imagem.css">
    <script src="cad_imagem.js"></script>
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

    <main class="container mt-5">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                A arte deve ter no máximo 1 minuto
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                    </ol>
                    <div class="carousel-inner">
                        <img class="d-block w-100" src="..." alt="" id="output">
                    </div>
                </div>
            </div>
        </div>

        <div class="row center">
            <div class="col-md-12 mt-5">
                <h2>Adicionando uma nova Obra</h2>
            </div>
        </div>

        <form action="function/insert-imgs.php" name="formFotos" method="POST" enctype="multipart/form-data">

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="timer">Timer</label>
                        <input type="number" name="timer" class="form-control input-bottom" id="timer" min="1000" max="3000" placeholder="Tempo em MS">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="titulo">Titulo da Obra</label>
                        <input type="text" name="titulo" class="form-control input-bottom" id="titulo" placeholder="Digite o titulo da obra">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="desc">Descrição </label>
                        <textarea name="desc" rows="1" class="form-control input-bottom" id="desc" placeholder="Digite a descrição da obra"></textarea>
                    </div>
                </div>
                <div class="col-md-1 mt-5">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="loop" id="loop">
                        <label class="form-check-label" for="loop">Loop</label>
                    </div>
                </div>
            </div>


            <input type="hidden" name="qt-inp" id="qt-inp">

            <div class="row mt-3">
                <div class="col-md-12">

                    <p class="center">Insira as imagens desejadas prar fazer um gif!</p>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="button" class=" btn btn-plus" id="add_espc"><i class="fas fa-plus"></i>ADD</button>
                            <button type="button" id="btn_limpar2" class="btn btn-primary">Limpar </button>
                            <div class="float-right">
                                <button type="button" id="salvar" class="btn btn-success">Enviar </i></button>
                            </div>
                        </div>
                    </div>


                    <div id="group-inputs" class="row mt-3">
                        <div id="_espc" class="col-md-6">
                            <div class="row mt-3 mr-2">
                                <div class="col-md-10">
                                    <label for="customFile">Foto</label>
                                    <div class="custom-file">
                                        <input style="width: 100%;" type="file" class="img" name="customFile" id="img_input" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <div class="col-md-2 margin-trash">
                                    <button id="remover_espc" class="btn btn-trash"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="alert" class="col-md-12 mt-5 hidden">
                        <div class="alert alert-warning" role="alert">
                            O timer precisa ser MAIOR que 1000 ou MENOR que 3000 Milisegundos
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </main>

</body>


</html>

<script>
    $("#salvar").on("click", function() {
        // console.log('a');
        if ($('#timer').val() != "") {
            if ($('#timer').val() >= 1000 && $('#timer').val() < 3000) {
                if ($("#titulo").val() != "") {
                    if ($("#desc").val() != "") {
                        if ($("#img_input").prop('files')[0] != undefined) {
                            localStorage.removeItem("titulo");
                            localStorage.removeItem("desc");
                            localStorage.removeItem("timer");
                            $('form[name="formFotos"]').submit();
                        } else {
                            alert('prenchar com uma foto')
                        }
                    } else {
                        $("#desc").attr('class', 'form-control input-erro');
                    }
                } else {
                    $("#titulo").attr('class', 'form-control input-erro');
                }
            } else {
                $('#alert').attr('class', 'col-md-12 mt-5 show');
            }
        } else {
            $("#timer").attr('class', 'form-control input-erro');
        }

    });
</script>