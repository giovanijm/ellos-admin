$("button.btn-voltar").on("click", function() {
    $(location).attr('href', route('admin.users.index'));
});

let showModalExclusao = function (idRegistro, nameRegistro, actionForm) {
    let $targetE2 = document.getElementById('modal-users');

    $targetE2.addEventListener('close.hs.overlay', (evt) => {
        console.log('Apagar dados');
        $("#formExcluir").attr('action', actionForm);
    });

    $("#lblMemsagemExclusao").html("<b>[" + idRegistro +"] " + nameRegistro + "</b>");

    $("#btnFecharModal").on("click", function() {
        window.HSOverlay.close($targetE2);
    });

    $("#btnRecusarModal").on("click", function() {
        window.HSOverlay.close($targetE2);
    });

    $("#formExcluir").on("submit", function(e){
        window.HSOverlay.close($targetE2);
    });

    window.HSOverlay.open($targetE2);
}

$(".form-exclusao").on("submit", function(e){
    e.preventDefault();
    var campoId = $(this).find('input[name="user_id"]')[0].value;
    var campoName = $(this).find('input[name="user_name"]')[0].value;
    var actionForm = $(this).attr('action');
    showModalExclusao(campoId, campoName, actionForm);
    return false;
});
