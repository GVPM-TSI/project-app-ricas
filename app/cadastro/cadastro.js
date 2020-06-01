$(function () {

    $("#btn_cadstro").on("click", function () {

        $(this).css("display", "none");
        $("#btn_loading").css("display", "block");

        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var senhaConf = $("#senhaConf").val();

        var dados = {
            "nome": nome,
            "email": email,
            "senha": senha,
        }

        if (nome != "") {
            if (email != "") {
                if (senha != "") {
                    if (senhaConf != "") {
                        if (senha == senhaConf) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: 'function/cadastro_usuario_banco.php',
                                data: dados,
                                success: function (data) {
                                    if (data.msg == true) {
                                        $("#email").val("");
                                        $("#senha").val("");

                                        $(this).css("display", "block");
                                        $("#btn_loading").css("display", "none");
                                        $("#btn_cadstro").css("display", "blobk");

                                        // swal({
                                        //     title: "Nice!",
                                        //     text: "Cadastro realizado com sucesso, agora faca seu login!!",
                                        //     icon: "success",
                                        //     button: {
                                        //         text: "OK!",
                                        //         // id: 'ok-modal',
                                        //     },
                                        // });
                                        
                                        $(location).attr('href', '../login/login.php');

                                    } else if (data.msg == false) {
                                        $("#nome").val();
                                        $("#email").val();
                                        $("#senha").val();
                                        $("#senhaConf").val();

                                        $(this).css("display", "block");
                                        $("#btn_loading").css("display", "none");

                                        swal("Erro :(", "Não foi possivel fazer seu cadastro! ", "error");
                                    }
                                }
                            });
                        } else {
                            $("#senhaConf").val("");
                            $("#senhaConf").css('border-bottom-color', 'red');

                            $(this).css("display", "block");
                            $("#btn_loading").css("display", "none");
                        }
                    } else {
                        $(this).css("display", "block");
                        $("#btn_loading").css("display", "none");
                        $("#senhaConf").css('border-bottom-color', 'red');
                    }
                } else {
                    $(this).css("display", "block");
                    $("#btn_loading").css("display", "none");
                    $("#senha").css('border-bottom-color', 'red');
                }
            } else {
                $(this).css("display", "block");
                $("#btn_loading").css("display", "none");
                $("#email").css('border-bottom-color', 'red');
            }
        } else {
            $(this).css("display", "block");
            $("#btn_loading").css("display", "none");
            $("#nome").css('border-bottom-color', 'red');
        }

    });

    $(".swal-button").on('click', function () {
        $(location).attr('href', '../login/login.php');
    })

});