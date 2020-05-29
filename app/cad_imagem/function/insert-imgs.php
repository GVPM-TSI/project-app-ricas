<?php
session_start();
require_once('../../../conexao.php');

echo $_POST['titulo'];
echo $_POST['desc'];

echo $_POST['qt-inp'];

$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$qt_inp = $_POST['qt-inp'];

$sql = $conn->prepare("INSERT INTO 
                        tbl_imagem

                        (titulo, descricao) 

                        VALUES 

                        ('$titulo', '$desc')

                    ");
$passed = $sql->execute();

$lastId = $conn->lastInsertId();


for ($i = 1; $i <= $qt_inp; $i++) {
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('dmY');
    // var_dump($_FILES["input_pesquisa" . $i]);
    $random = random_int(1, 100);
    $data = intval($data);
    $data = $data * $random;

    $ext = strtolower(substr($_FILES["input_pesquisa" . $i]['name'], -4)); //Pegando extensão do arquivo
    $new_name = $data ."-" .$_SESSION['codigo']. $lastId . $ext; //Definindo um novo nome para o arquivo
    $dir = '../../image/'; //Diretório para uploads 
    move_uploaded_file($_FILES["input_pesquisa" . $i]['tmp_name'], $dir . $new_name); //Fazer upload do arquivo

    $codigo = $_SESSION['codigo'];

    $sql = $conn->prepare("INSERT INTO 
                        tbl_imagem_caminho 

                        (id_galeria, url, id_usuario) 

                        VALUES 

                        ('$lastId', '$new_name', $codigo )

                    ");
    $passed2 = $sql->execute();
}