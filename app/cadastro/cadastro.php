<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Obras Primas</title>
    <?php require_once('../../assets/includes/extensoes.php') ?>
    <link rel="stylesheet" href="cadastro.css">
    <script src="cadastro.js"></script>
</head>

<body>
    <header>
        <?php require_once('../../assets/includes/navbar.php') ?>
    </header>

    <main class="container">
        <div class="row">
            <div id="form-login" class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control input-bottom" id="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control input-bottom" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control input-bottom" id="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group">
                        <label for="senha">Confirme sua senha</label>
                        <input type="password" class="form-control input-bottom" id="senhaConf" placeholder="Digite sua senha">
                    </div>
                </form>
                <button id="btn_cadstro" class="btn btn-outline-success btn-block">ENVIAR</button>
                <button id="btn_loading" class="btn btn-outline-success btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Loading ...</button>
            </div>
        </div>  
    </main>
</body>

</html>