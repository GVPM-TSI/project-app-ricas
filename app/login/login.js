$(function () {

    $("#btn_login").on("click", function () {

        $("#btn_login").css("display", "none");
        $("#btn_loading").css("display", "block");

        var email = $("#email").val();
        var senha = $("#senha").val();

        var dados = {
            "email": email,
            "senha": senha,
        }

        if (email != "") {
            if (senha != "") {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'function/valida-login.php',
                    data: dados,
                    success: function (data) {
                        console.log(data);

                        if (data.msg == true) {
                            $("#email").val("");
                            $("#senha").val("");

                            $("#btn_login").css("display", "block");
                            $("#btn_loading").css("display", "none");

                            window.location.href = '../index/index.php';


                        } else if (data.msg == false) {
                            $("#email").val(data.email);
                            $("#senha").val("");

                            $("#btn_login").css("display", "block");
                            $("#btn_loading").css("display", "none");

                            swal("Erro :(", "Não foi possivel fazer o login", "error");

                        } else if (data.msg == "user_not_found") {
                            $("#email").val(data.email);
                            $("#senha").val("");

                            $("#btn_login").css("display", "block");
                            $("#btn_loading").css("display", "none");

                            swal("Ops...", "Usuario nao encontrado", "warning");
                        }
                    }
                });

            } else {
                $(this).css("display", "block");
                $("#btn_loading").css("display", "none");
                $('#senha').css('border-bottom-color', 'red');
            }
        } else {
            $(this).css("display", "block");
            $("#btn_loading").css("display", "none");
            $('#email').css('border-bottom-color', 'red');
        }
    });
});
