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
    <link rel="stylesheet" href="visualizar.css">
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

                <?php
                // var_dump($_GET['id']);

                $sql = $conn->query("SELECT 
                                        a.cd_img,
                                        a.id_galeria,
                                        a.url,
                                        a.id_usuario,
                                        b.timer,
                                        b.loop_ft,
                                        b.titulo,
                                        b.descricao
                                    FROM
                                        tbl_imagem_caminho AS a
                                    LEFT JOIN
                                        tbl_imagem AS b ON a.id_galeria = b.cd_img
                                    WHERE
                                        a.id_galeria =" . $_GET['id']);

                $qt_row = $sql->rowCount();

                if ($qt_row > 0) {

                    while ($ret = $sql->fetch(PDO::FETCH_OBJ)) {
                        $array[$ret->id_galeria][] = [
                            'id_galeria' => $ret->id_galeria,
                            'url' => "../image/" . $ret->url,
                            'titulo' => $ret->titulo,
                            'desc' => $ret->descricao,
                            'idusuario' => $ret->id_usuario,
                            'timer' => $ret->timer,
                            'loop' => $ret->loop_ft,
                        ];
                    }

                    // echo "<pre>";
                    // print_r($array) ;
                    // echo "</pre>";

                    $g = 0;
                    foreach ($array as $key => $value) {
                ?>
                        <script>
                            gifImages = <?php echo json_encode($array); ?>

                            // console.log(gifImages)

                            function changePicture(i) {
                                $("#<?php echo $array[$key][$g]['id_galeria'] ?>").attr('src', gifImages[<?php echo $array[$key][$g]['id_galeria'] ?>][x]['url']);

                                x++;

                                if (x >= i) {
                                    x = 0;

                                }

                            }

                            var i = <?php echo Count($array[$key]) ?>

                            if (<?php echo $array[$key][$g]['loop'] ?> == 1) {
                                setInterval(() => {

                                    changePicture(i)

                                }, <?php echo $array[$key][$g]['timer'] ?>);
                            } else {
                                var time = 0;
                                do {
                                    setInterval(() => {

                                        changePicture(i)

                                    }, <?php echo $array[$key][$g]['timer'] ?>);

                                    time += <?php echo $array[$key][$g]['timer'] ?>;
                                } while (time >= 60000);

                            }
                        </script>
                        <h2 class="center"><?php echo $array[$key][$g]['titulo'] ?></h2>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <img id="<?php echo $array[$key][$g]['id_galeria']; ?>" class="img-visualizar">
                            </div>

                            <div class="col-md-6">
                                <hr>
                                <p>Descricao:</p>
                                <p><?php echo $array[$key][$g]['desc'] ?></p>
                                <hr>
                                <?php $sql = $conn->query("SELECT * from usuario where cd_usu =" . $array[$key][$g]['idusuario']);
                                $ret2 = $sql->fetch(PDO::FETCH_OBJ);
                                ?>
                                <p>Artista:</p>
                                <p><?php echo $ret2->nm_usu ?></p>
                                <hr>
                            </div>
                        </div>



                    <?php $g++;
                    }
                } else { ?>

                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            Nenhum item na galeria!
                        </div>
                    </div>
                <?php } ?>

            </div>

</body>


</html>