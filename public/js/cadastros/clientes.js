function buscarMunicipios() {

    //teste
    var token = $("#token").val();
    var estado_id = $("#uf").val();
    console.log('estado id'+estado_id);
    //    var json = stringToJson(colaboradores);
    //    console.log(json);
    $.ajax({
        url: '/painel/clientes/busca-municipio',
        type: 'POST',
        method: 'POST',
        ContentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': token },
        data: {'_token': token,'estado_id': estado_id},
        beforeSend: function () {
        },
        success: function (response) {
            response = JSON.parse(response);
            console.log(response.cidades);
           // teste 2
            if ("#uf" != "") {
                document.getElementById('cidade').disabled = false;
            }
            document.getElementById("cidade").innerHTML = "";
            $.each(response.cidades,
                function (index, cidade) {
                    if(index==0){
                        $("#cidade").append("<option selected value=''>Selecione</option>");
                    }
                    $("#cidade").append("<option value=" + cidade.id + ">" + cidade.title + "</option>");
                });
        },
        
        statusCode: {
            //erro de autenticação em caso de logout
            401: function () {
                alert("Necessário fazer login novamente!");
                window.location = "/";
                //                window.location.reload();
            },
            //erro de servidor
            500: function () {
                alert("Erro servidor");
            },
            //not found
            404: function () {
                alert("Arquivo não encontrado");
            }
        }
    });

}