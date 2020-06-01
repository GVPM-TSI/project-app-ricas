$(function () {
    $('#titulo').val(localStorage.getItem("titulo"))
    $('#desc').val(localStorage.getItem("desc"))

    // Vamos usar um número de índice exclusivo para cada nova instância do formulário clonado
    var _espc_clone_index = 0;
    //When the button is clicked (or Enter is pressed while it's selected)
    $("#add_espc").click(function () {
        // Incremente o índice exclusivo porque estamos criando uma nova instância do formulário
        _espc_clone_index++;
        $("#qt-inp").val(_espc_clone_index);
        // Clonar o formulário e colocá-lo apenas antes do botão <p>. Também dê ao seu id um índice exclusivo
        $(this).parent().after($("#_espc").clone().attr("id", "_espc" + _espc_clone_index));
        // Tornar o clone visível alterando CSS
        $("#_espc" + _espc_clone_index).css("display", "inline");
        // Altera a ID do INPUT remover
        $("#_espc" + _espc_clone_index + " input").attr("name", "input_pesquisa" + _espc_clone_index);
        $("#_espc" + _espc_clone_index + " button").attr("id", "remover_espc" + _espc_clone_index);
        // Quando o botão Remover é clicado (ou Enter é pressionado enquanto ele está selecionado)
        $("#remover_espc" + _espc_clone_index).click(function () {
            // Remove
            $(this).parent().parent().remove();
            buscar

        });
    });

    $("#btn_limpar2").click(function () {
        for (x = _espc_clone_index; x > 0; x--) {
            $("#_espc" + x).remove();
        }

        _espc_clone_index = 0;
        $("#qt-inp").val(_espc_clone_index);
    })

    $("#btn-enviar").click(function () {
        var text = $("#txt_conteudo").val();
        text = text.replace(/\n/g, "<br />");

        $("#destino").html(text);
    });

    $("#btn-limpar").click(function () {
        $("#txt_conteudo").val("");
    });

    $("#btn_enviar").on("click", function () {
        alert($("#form_teste").serialize());
    });


    $("#salvar").on("click", function () {
        // console.log($("#img_input").prop('files')[0]);

        if ($("#titulo").val() != "") {
            if ($("#desc").val() != "") {
                if ($("#img_input").prop('files')[0] != undefined) {
                    localStorage.removeItem("titulo");
                    localStorage.removeItem("desc");
                    $('form[name="formFotos"]').submit();
                } else {
                    alert('prenchar com uma foto')
                }
            } else {
                $("#desc").attr('class', 'form-control input-erro');
            }
        } else {
            $("#titulo").attr('class', 'form-control input-erro');
        }

    });

    $(".img").on('change', function () {
       console.log(this); 
    });

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });



    // $("#btnsearch").click(function (e) {
    //     for (x = _espc_clone_index; x >= 0; x--) {
    //         // $("#destino").highlight($("#input_pesquisa" + x).val());
    //         console.log(x);
            
    //     }
    // });


    $("#titulo").blur(function() {
        localStorage.setItem("titulo", $(this).val());
    });

    $("#desc").blur(function() {
        localStorage.setItem("desc", $(this).val());
    });


    function verifica_imagem(img) {
        $("#alertgif").attr('class', 'alert alert-warning mt-3 hidden')
        $("#alertNotImg").attr('class', 'alert alert-warning mt-3 hidden')

        if (img != "image/gif") {
            if (img.split('/')[0] === 'image') {
                return true
            } else {
                $("#alertNotImg").attr('class', 'alert alert-warning mt-3 show');
                return false;
            }
        } else {
            $("#alertgif").attr('class', 'alert alert-warning mt-3 show');
            return false;
        }

    }


})