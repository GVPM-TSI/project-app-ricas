<?php
session_start();
require_once('../../conexao.php');

$codigo = $_SESSION['codigo'];
$sql = $conn->query("SELECT * FROM usuario WHERE cd_usu = $codigo");
$ret = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - <?php echo $ret->nm_usu; ?></title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
</head>

<header>
<?php
        if (!isset($_SESSION['codigo'])) {
            require_once('../../assets/includes/navbar.php');
        } else {
            require_once('../../assets/includes/navbarLogado.php');
        }
        ?>
</header>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h2 class="center">Editar Perfil</h2>
            </div>
        </div>

        <div class="row">
            <div>
                <input type="hidden" class="input-bottom" name="nome" id="id" value="<?php echo $_GET['id']?>">
            </div>
            <div class="col-md-6 mt-5">
                <label for="nome">Nome</label>
                <input type="text" class="input-bottom" name="nome" id="nome" value="<?php echo $ret->nm_usu?>">
            </div>
            <div class="col-md-6 mt-5">
                <label for="email">Email</label>
                <input type="email" class="input-bottom" name="email" id="email" value="<?php echo $ret->nm_email?>">
            </div>
            <div class="col-md-6 mt-5">
                <label for="senha">Senha</label>
                <input type="password" class="input-bottom" name="senha" id="senha">
            </div>
            <div class="col-md-6 mt-5">
                <label for="confSenha">Conf. Senha</label>
                <input type="password" class="input-bottom" name="confSenha" id="confSenha">
            </div>

            <div class="col-md-12 mt-5">
                <button class="btn btn-success float-right" id="salvarEditar">Salvar</button>
            </div>

            <div class="col-md-12 mt-5">
                <div id="ret"></div>
            </div>
        </div>
</body>

</html>
<script src="editar.js"></script>