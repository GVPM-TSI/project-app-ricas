<?php
    session_start();
    require_once('../../../conexao.php');
    
    $id = $_GET['id'];

    $sql = $conn->query("DELETE FROM tbl_imagem_caminho WHERE id_galeria = '$id'");

    $sql = $conn->query("DELETE FROM tbl_imagem WHERE cd_img='$id'");

    header('location:../perfil.php');
    