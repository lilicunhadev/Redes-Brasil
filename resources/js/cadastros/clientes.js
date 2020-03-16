function buscarMunicipios() {

    var token = $("#token").val();
    var estado_id = $("#uf").val();
    console.log('estado id'+estado_id);
    //    var json = stringToJson(colaboradores);
    //    console.log(json);
    $.ajax({
        url: '/cliente/'+estado_id,
        type: 'get',
        method: 'get',
        headers: { 'X-CSRF-TOKEN': token },
        beforeSend: function () {
            $('a').addClass('disabled');
            $.blockUI({ message: null });
        },
        success: function (response) {

            $('a').removeClass('disabled');

            response = JSON.parse(response);
            console.log(response);
            $("#myModalLabel").html('Atribuir treinamento - ' + response.descricao);
            $("#model_id").val(id);
            $("#tipo").val(tipo);
            $("#date_modal").val("");
            $("#ult_realizado").val("");
            $("#model-table").find("tr:gt(0)").remove();
            setTimeout($.unblockUI, 10);

            $("#treinamento").html("");
            $.each(response.treinamentos,
                function (index, treinamento) {
                    $("#treinamento").append("<option selected value=" + treinamento.id + ">" + treinamento.descricao + "</option>");
                });

            var len = response.size_obrigacoes;

            for (var i = 0; i < len; i++) {
                console.log(response.obrigacoes[i]);
                // console.log(response.vendas[i].doc);
                var obrigacao_id = response.obrigacoes[i].id;
                var nome = response.obrigacoes[i].descricao;
                var necessidade = response.obrigacoes[i].pivot.necessidade;
                var ult_realizado = moment(response.obrigacoes[i].pivot.ult_realizado, 'YYYY-MM-DD').format('DD/MM/YYYY');
                var criado = moment(response.obrigacoes[i].pivot.created_at, 'YYYY-MM-DD').format('DD/MM/YYYY');

                var tr_str = "<tr>" +
                    // action='/home/relatorios/metas-vendas-mensal/"+num_pedido+"'
                    "<td align='center'>" + nome + "</td>" +
                    "<td align='center'>" + necessidade + "</td>" +
                    "<td align='center'>" + ult_realizado + "</td>" +
                    "<td align='center'>" + criado + "</td>" +
                    "<td align='center'>" + "<button onclick='RemoveTableRow(this," + obrigacao_id + ")'  class='btn btn-danger flaticon2-trash'  type='button'></button>" + "</td>" +
                    "</tr>";
                $("#model-table").append(tr_str);
            }
            $('#ModalSetor').modal('toggle');
        },
        statusCode: {
            //erro de autenticação em caso de logout
            401: function () {
                alert("Necessário fazer login novamente!");
                window.location = "/home";
                //                window.location.reload();
            },
            //erro de servidor
            500: function () {
                alert("Erro servidor");
            },
            //not found
            404: function () {
                alert("Arquivo não encontado");
            }
        }
    });

}