<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Obras Primas</title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
</head>

<body>
    <header>
        <?php require_once('../../assets/includes/navbar.php') ?>
    </header>

    <main class="container">
        <form class="row" enctype="multipart/form-data">
            <div id="form-login" class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control input-bottom" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control input-bottom" id="senha" placeholder="Digite sua senha">
                    </div>
                </form>
                <button id="btn_login" class="btn btn-outline-success btn-block">ENVIAR</button>
                <button id="btn_loading" class="btn btn-outline-success btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Loading ...</button>
                <?php
                if (isset($_GET['erro'])) {
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        O login é necessário
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>

            </div>
        </form>
    </main>
</body>

</html>