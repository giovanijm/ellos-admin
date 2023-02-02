$("#btnVoltar").on("click", function() {
    $(location).attr('href', route('admin.permissions.index'));
});

let showModalExclusao = function (idRegistro, nameRegistro, actionForm) {
    let $targetE2 = document.getElementById('modalE2');
    let options = {
        placement: 'center-center',
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        closable: true,
        onShow: () => {
            $("#formExcluir").attr('action', actionForm);
        },
    };
    let modalExclusao = new Modal($targetE2, options);

    $("#lblMemsagemExclusao").html("<b>[" + idRegistro +"] " + nameRegistro + "</b>");

    $("#btnFecharModal").on("click", function() {
        modalExclusao.hide();
    });

    $("#btnRecusarModal").on("click", function() {
        modalExclusao.hide();
    });

    $("#formExcluir").on("submit", function(e){
        modalExclusao.hide();
    });

    modalExclusao.show();
}

$(".btn-exclusao").on("click", function() {
    console.log(this.getAttribute('namepermission'));
});

$(".form-exclusao").on("submit", function(e){
    e.preventDefault();
    var campoId = $(this).find('input[name="permission_id"]')[0].value;
    var campoName = $(this).find('input[name="permission_name"]')[0].value;
    var actionForm = $(this).attr('action');
    showModalExclusao(campoId, campoName, actionForm);
    return false;
});

$("#frmBuscaIndex input[name=campo-radio]").on("click", function() {
    $("#labelBusca").html(this.getAttribute('value-label'));
    $("#row-selected").val(this.getAttribute('value-label'));
});
