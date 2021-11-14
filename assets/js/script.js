$(document).ready(function(){


    $("#notify").hide();

    var aux = $("#notify").text();
    var aux = aux.split(',');

    var objecto = aux[0];
    var accao = aux[1];
    var mensagem = aux[2];

    if (accao == "success") {
        new PNotify({
            title: objecto,
            text: mensagem,
            type: 'success'
        });
    }
    if (accao == "error") {
        new PNotify({
            title: objecto,
            text: mensagem,
            type: 'error'
        });
    }

    /* datatable */


    /* Form */
    // $(".select2").select2();

    // $('#dataTable').DataTable();
    // $('#dataTable1').DataTable();

    // /* tipo colaborador */
    // var tipo_colaborador = $("#tipo_colaborador").val();
    // if (tipo_colaborador == "interno") {
    //     $("#colaborador_externo").show();
    //     $("#edit_colaborador_instituicao").show();
    //     $("#colaborador_interno").hide();
    //     $("#colaborador_instituicao").hide();
    // }
    // if(tipo_colaborador == "externo") {
    //     $("#colaborador_externo").hide();
    //     $("#edit_colaborador_instituicao").hide();
    //     $("#colaborador_interno").show();
    //     $("#colaborador_instituicao").show();
    // }


    // $("#colaborador_externo").click(function(){
    //     $("#tipo_colaborador").val("externo");
    //     $("#colaborador_externo").hide();
    //     $("#edit_colaborador_instituicao").hide();
    //     $("#colaborador_interno").show();
    //     $("#colaborador_instituicao").show();
    // });

    // $("#colaborador_interno").click(function(){
    //     $("#tipo_colaborador").val("interno");
    //     $("#colaborador_externo").show();
    //     $("#edit_colaborador_instituicao").show();
    //     $("#colaborador_interno").hide();
    //     $("#colaborador_instituicao").hide();
    // });

    // var tema = $("#tema").val();
    // if (tema == "selecao") {
    //     $(".requisicao").hide();
    //     $(".proposta").hide();
    //     $(".tema_nota").hide();
    // }

    // $("#selecao").click(function(){
    //     $("#tema").val("selecao");
    //     $(".tema_id").show();
    //     $(".requisicao").hide();
    //     $(".proposta").hide();
    //     $(".tema_nota").hide();
    // });

    // $("#proposta").click(function(){
    //     $("#tema").val("proposta");
    //     $("#nota_tema").text("Proposta de tema, preenchimento de todos campos obrigatorio");
    //     $(".tema_id").hide();
    //     $(".requisicao").hide();
    //     $(".proposta").show();
    //     $(".tema_nota").show();
    // });
    // $("#requisicao").click(function(){
    //     $("#tema").val("requisicao");
    //     $("#nota_tema").text("requisicao de tema, selecao de areas e linhas de investigacoes opcionais");
    //     $(".tema_id").hide();
    //     $(".requisicao").show();
    //     $(".proposta").hide();
    //     $(".tema_nota").show();
    // });

/* FIM */
});
