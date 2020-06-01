<?php
session_start();
require_once('../../conexao.php');
?>
<script>
    var x = 0;
</script>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obras Primas</title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
    <link rel="stylesheet" href="index.css">
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
        <div class="row">
            <div class="col-md-12">
                <a id="add" href="../cad_imagem/cad_imagem.php">
                    <button class=" btn btn-success float-right nav-item">
                        Adicionar nova obra
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="center">Galeria</h2>
            </div>
        </div>

        <div class="row">

            <?php
            $sql = $conn->query("SELECT * FROM tbl_imagem");


            $qt_row = $sql->rowCount();

            // echo $qt_row;

            if ($qt_row > 0) {

                while ($ret = $sql->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <h4 class="card-title"><?php echo $ret->titulo ?></h4>
                            <div class="card-body">
                                <p class="card-text"><?php echo $ret->descricao ?></p>
                            </div>
                            <a class="btn btn-primary" href="../visualizar/visualizar.php?id=<?php echo $ret->cd_img ?>">Visualizar</button></a>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12 mt-5  ">
                    <div class="alert alert-warning" role="alert">
                        Nenhum retorno do banco!
                    </div>
                </div>


            <?php } ?>
        </div>

</body>


</html>
<script src="index.js"></script>