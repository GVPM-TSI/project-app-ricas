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
    <link rel="stylesheet" href="perfil.css">
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
                <h2 class="center"><?php echo $ret->nm_usu?></h2>
                <a href="../editar/editar.php?id=<?php echo $ret->cd_usu?>"><button class="btn btn-inv float-right"> Editar Perfil</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <h3 class="center">Minhas Fotos</h3>
            </div>
        </div>
</body>

</html>