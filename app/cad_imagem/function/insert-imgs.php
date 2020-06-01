<?php
session_start();
require_once('../../../conexao.php');

// echo $_POST['titulo'];
// echo $_POST['desc'];

// echo $_POST['qt-inp'];

$codigo = $_SESSION['codigo'];
$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$qt_inp = $_POST['qt-inp'];
$timer = $_POST['timer'];

if(!isset($_POST['loop'])){
    // echo 'nao tem nada';
    $sql = $conn->prepare("INSERT INTO 
                        tbl_imagem

                        (titulo, descricao, id_usu, timer, loop_ft) 

                        VALUES 

                        ('$titulo', '$desc', $codigo, $timer, '0')

                    ");
    $passed = $sql->execute();

    $lastId = $conn->lastInsertId();
}else{
    $sql = $conn->prepare("INSERT INTO 
                        tbl_imagem

                        (titulo, descricao, id_usu, timer, loop_ft) 

                        VALUES 

                        ('$titulo', '$desc', $codigo, $timer, '1')

                    ");
    $passed = $sql->execute();

    $lastId = $conn->lastInsertId();
}




for ($i = 1; $i <= $qt_inp; $i++) {
    // var_dump($_FILES["input_pesquisa" . $i]);

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('dmY');
    $random = random_int(1, 100);
    $data = intval($data);
    $data = $data * $random;

    $ext = strtolower(substr($_FILES["input_pesquisa" . $i]['name'], -4)); //Pegando extensão do arquivo
    $new_name = $data . '-'. $_SESSION['codigo']. $lastId . $ext; //Definindo um novo nome para o arquivo
    $dir = '../../image/'; //Diretório para uploads 
    move_uploaded_file($_FILES["input_pesquisa" . $i]['tmp_name'], $dir . $new_name); //Fazer upload do arquivo


    

    $sql = $conn->prepare("INSERT INTO 
                        tbl_imagem_caminho 

                        (id_galeria, url, id_usuario) 

                        VALUES 

                        ('$lastId', '$new_name', $codigo )

                    ");
    $passed2 = $sql->execute();
}

header("location:../../index/index.php");