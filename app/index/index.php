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
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="center">Galeria</h2>
            </div>
        </div>

        <div class="row">

            <?php


            $sql = $conn->query("SELECT 
                                        a.cd_img,
                                        a.id_galeria,
                                        a.url,
                                        a.id_usuario,
                                        b.titulo,
                                        b.descricao
                                    FROM
                                        tbl_imagem_caminho AS a
                                    LEFT JOIN
                                        tbl_imagem AS b ON a.id_galeria = b.cd_img
                                
                                    ");

            $qt_row = $sql->rowCount();

            if ($qt_row > 0) {

                while ($ret = $sql->fetch(PDO::FETCH_OBJ)) {
                    $array[$ret->id_galeria][] = [
                        'id_galeria' => $ret->id_galeria,
                        'url' => $ret->url,
                        'titulo' => $ret->titulo,
                        'desc' => $ret->descricao
                    ];
                }


                $g = 0;
                foreach ($array as $key => $value) {
                    // echo  $array[$key][0]['url'] "<br>";
                    // echo  $array[$key][1]['url'];
            ?>
                    <script>
                        <?php $i = 0 ?>

                        var i = <?php echo Count($array[$key]); ?>

                        function changePicture(qt_foto) {
                            <?php
                            $currentFrame = 0;
                            ?>
                            var currentFrame = 0;

                            $("#<?php echo $array[$key][$g]['id_galeria'] ?>").attr('src', "../image/" + "<?php echo  $array[$key][$currentFrame]['url'] ?>")
                            <?php $currentFrame++; ?>
                            currentFrame++;
                            if (currentFrame >= qt_foto) { //If we've gone past the end of our array of frames, then:
                                <?php $currentFrame = 0; ?>
                                currentFrame = 0;
                            }
                        }
                        setInterval(() => {
                            changePicture(i)
                        }, 1000);
                    </script>


                    <div class="col-md-3">
                        <div class="card" style="width:200px">
                            <h4 class="card-title"><?php echo $array[$key][$g]['titulo'] ?></h4>
                            <img class="card-img-top" id="<?php echo $array[$key][$g]['id_galeria'] ?>" src="" style="width: 100%">
                            <div class="card-body">
                                <p class="card-text"><?php echo $array[$key][$g]['desc'] ?></p>
                                <!-- <a href="#" class="btn btn-primary stretched-link">See Profile</a> -->

                            </div>
                        </div>
                    </div>
            <?php $g++;
                }
            } else{?>

            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Nenhum item na galeria!
                </div>
            </div>
            <?php } ?>

        </div>

</body>


</html>