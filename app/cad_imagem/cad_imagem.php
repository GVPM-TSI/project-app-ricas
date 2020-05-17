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

        <div class="row center">
            <div class="col-md-12 mt-5">
                <h2>Adicionando uma nova Obra</h2>
            </div>
        </div>

        <form action="function/insert-imgs.php" method="POST" enctype="multipart/form-data">

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Titulo da Obra</label>
                        <input type="text" name="titulo" class="form-control input-bottom" id="titulo" placeholder="Digite o titulo da obra">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desc">Descrição </label>
                        <textarea name="desc" rows="1" class="form-control input-bottom" id="desc" placeholder="Digite a descrição da obra"></textarea>
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
                                <button type="submit" id="btnsearch" class="btn btn-success">Enviar </i></button>
                            </div>
                        </div>
                    </div>

                    <div id="group-inputs" class="row mt-3">
                        <div id="_espc" class="col-md-4">
                            <div class="row mt-3 mr-2">
                                <div class="col-md-10">
                                    <label for="customFile">Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="img" name="customFile" id="img_input" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-2 margin-trash">
                                    <button id="remover_espc" class="btn btn-trash"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>


        <!-- <div class="row">
            <div class="col-md-6 mt-5">
                <label for="customFile">Foto</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input " name="customFile" id="img_input">
                    <label class="custom-file-label" for="customFile">Deposite sua foto aqui !</label>
                </div>
                <div id="alert" class="alert alert-warning mt-3 hidden" role="alert">
                    Preencha com uma foto
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="alertgif" class="alert alert-warning mt-3 hidden" role="alert">
                    Gif não é aceito
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="alertNotImg" class="alert alert-warning mt-3 hidden" role="alert">
                    O arquivo não é uma imagem!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <button class=" btn btn-success" id="add_espc">ADD</button>

                <div id="_espc" class="col-md-4">
                    <div class="row mt-3 mr-2">
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Palavra de busca">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button id="remover_espc" class="btn btn-trash"><i class="far fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
                <button id="salvar" class="btn btn-success float-right">Salvar</button>
            </div>
        </div> -->
    </main>

</body>


</html>