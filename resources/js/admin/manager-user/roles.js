$("button.btn-voltar").on("click", function() {
    $(location).attr('href', route('admin.roles.index'));
});

let showModalExclusao = function (idRegistro, nameRegistro, actionForm) {
    let $targetE2 = document.getElementById('modal-roles');

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
    var campoId = $(this).find('input[name="role_id"]')[0].value;
    var campoName = $(this).find('input[name="role_name"]')[0].value;
    var actionForm = $(this).attr('action');
    showModalExclusao(campoId, campoName, actionForm);
    return false;
});

$("button.btn-no-select-all").on("click", function(e) {
    var targetName = e.currentTarget.getAttribute("target_name");
    $('#'+targetName+' input[type=checkbox]').each(function() {
        $(this).attr('checked', false);
        $(this).prop('checked', false);
    });
});

$("button.btn-select-all").on("click", function(e) {
    var targetName = e.currentTarget.getAttribute("target_name");
    $('#'+targetName+' input[type=checkbox]').each(function() {
        $(this).attr('checked', true);
        $(this).prop('checked', true);
    });
});

$("button.btn-select-invert").on("click", function(e) {
    var targetName = e.currentTarget.getAttribute("target_name");
    $('#'+targetName+' input[type=checkbox]').each(function() {
        var estado = $(this).prop('checked') ? false : true;
        $(this).attr('checked', estado);
        $(this).prop('checked', estado);
    });
});

$("button.btn-search-checkbox").on("click", function(e) {
    var filter = $('input.input-search-checkbox').val().toUpperCase();
    var targetName = e.currentTarget.getAttribute("target_name");
    var resultLabel = $('#'+targetName+' label');
    resultLabel.each(function(){
        var nameObj = $(this).prop('for');
        if(this.innerText.toUpperCase().indexOf(filter) > -1){
            $('#'+targetName+'  div[for='+nameObj+']').removeClass('hidden');
            $('#'+targetName+'  div[for='+nameObj+']').addClass('block');
        }else{
            $('#'+targetName+'  div[for='+nameObj+']').addClass('hidden');
            $('#'+targetName+'  div[for='+nameObj+']').removeClass('block');
        }
    });
});

$("button.btn-search-checkbox-clear").on("click", function(e) {
    var targetName = e.currentTarget.getAttribute("target_name");
    var resultLabel = $('#'+targetName+' label');
    resultLabel.each(function(){
        var nameObj = $(this).prop('for');
        $('#'+targetName+'  div[for='+nameObj+']').removeClass('hidden');
        $('#'+targetName+'  div[for='+nameObj+']').addClass('block');
    });
    $('input.input-search-checkbox').val('');
    $('input.input-search-checkbox')[0].focus();
});

$('input.input-search-checkbox').on("keydown", function(e) {
    switch (e.code.toUpperCase()) {
        case 'ENTER':
            $("button.btn-search-checkbox").trigger('click');
            break;
        case 'ESCAPE':
            $("button.btn-search-checkbox-clear").trigger('click');
            break;
    }
});
