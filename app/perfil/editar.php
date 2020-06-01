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

        <div class="row center">
            <div class="col-md-12 mt-5">
                <h2>Adicionando uma nova Obra</h2>
            </div>
        </div>

        <?php
            $sql = $conn->query("SELECT * FROM tbl_imagem where cd_img = " . $_GET['id']);
            $ret = $sql->fetch(PDO::FETCH_OBJ)
        ?>

        <form action="function/update.php?id=<?php echo $ret->cd_img?>" name="formFotos" method="POST">

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="timer">Timer</label>
                        <input type="number" name="timer" class="form-control input-bottom" id="timer" min="1000" max="3000" placeholder="Tempo em MS" value="<?php echo $ret->timer?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="titulo">Titulo da Obra</label>
                        <input type="text" name="titulo" class="form-control input-bottom" id="titulo" placeholder="Digite o titulo da obra" value="<?php echo $ret->titulo?>">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="desc">Descrição </label>
                        <textarea name="desc" rows="1" class="form-control input-bottom" id="desc" placeholder="Digite a descrição da obra"><?php echo $ret->descricao?></textarea>
                    </div>
                </div>

                <div class="col-md-12 float-right">
                    <button type="submit" id="salvar" class="btn btn-success">Enviar</button>
                </div>
            </div>

        </form>

    </main>

</body>


</html>
