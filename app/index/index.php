<?php
session_start();
require_once('../../conexao.php');
?>
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
        <div class="row center">
            <div class="col-md-12 mt-5">
                <h2>Galeria</h2>
            </div>
        </div>
        
        <div class="row">
        
        <?php
            $sql = $conn->query("SELECT * FROM tbl_imagem_caminho as a , tbl_imagem as b WHERE a.id_foto = b.cd_img");

            while($ret = $sql->fetch(PDO::FETCH_OBJ)){
        ?>
            <div class="col-md-3">
                <div class="card" style="width:200px">
                    <h4 class="card-title"><?php echo $ret->titulo ?></h4>
                    <img class="card-img-top" src="../image/image29.png" alt="Card image" style="width: 100%">
                    <div class="card-body">
                        <p class="card-text"><?php echo $ret->descricao ?></p>
                        <!-- <a href="#" class="btn btn-primary stretched-link">See Profile</a> -->
                    </div>
                </div>
            </div>
        <?php 
            }
        ?>
        </div>
    </main>

</body>


</html>