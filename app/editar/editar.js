$(function () {
    $("#salvarEditar").on('click', function () {
        if ($('#nome').val() != "") {
            if ($('#email').val() != "") {
                if ($('#senha').val() != "") {
                    if ($('#confSenha').val() != "") {
                        if ($('#senha').val() == $('#confSenha').val()) {
                            var dados = {
                                id: $("#id").val(),
                                nome: $("#nome").val(),
                                email: $("#email").val(),
                                senha: $("#senha").val(),
                            }
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: 'function/editar-usuario.php',
                                data: dados,
                                success: function (data) {

                                    if (data.msg) {
                                        $('#ret').attr('class', 'alert alert-success alert-novo-servico');
                                        $('#ret').html("Dados alterados com sucesso !");

                                        setTimeout(() => {
                                            $('#ret').attr('class', 'hidden');
                                        }, 2000);
                                    } else {
                                        $('#ret').attr('class', 'alert alert-danger alert-novo-servico');
                                        $('#ret').html("Erro ao alterar os dados !");

                                        setTimeout(() => {
                                            $('#ret').attr('class', 'hidden');
                                        }, 2000);
                                    }
                                }
                            });
                        } else {
                            //senhas 
                            $('#ret').attr('class', 'alert alert-danger alert-novo-servico');
                            $('#ret').html("Senhas Diferentes !");

                            setTimeout(() => {
                                $('#ret').attr('class', 'hidden');
                            }, 2000);
                        }
                    } else {
                        //confSenha
                        $("#confSenha").attr('class', 'form-control input-erro');
                    }
                } else {
                    //senha
                    $("#senha").attr('class', 'form-control input-erro');
                }
            } else {
                //email
                $("#email").attr('class', 'form-control input-erro');
            }
        } else {
            //nome
            $("#nome").attr('class', 'form-control input-erro');
        }

    });
});