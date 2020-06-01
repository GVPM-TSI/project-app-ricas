<?php
    require_once('../../../conexao.php');

    $timer = $_POST['timer'];
    $titulo = $_POST['titulo'];
    $desc = $_POST['desc'];

    $id = $_GET['id'];

    $sql = $conn->query("UPDATE tbl_imagem SET titulo='$titulo', descricao='$desc', timer='$timer' WHERE cd_img='$id'");

    header('Location: ../perfil.php');