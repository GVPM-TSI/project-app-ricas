<?php
    session_start();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_POST['id'];

    require_once('../../../conexao.php');

    $sql = $conn->query("UPDATE usuario SET nm_usu='$nome', nm_email='$email', nm_senha='$senha' WHERE cd_usu='$id'");
    $users = $sql->fetch(PDO::FETCH_OBJ);

    $count = $sql->rowCount();

    if($count > 0){
        $array = array(
            "msg" => TRUE,
        );

        echo json_encode($array);
    }else{
        $array = array(
            "msg" => FALSE,
        );

        echo json_encode($array);
    }
